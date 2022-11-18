<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Libraries\Helper;
use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\ProjectRelate;
use App\Services\Admin\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    protected $module = 'Project';
    private $item = 'project';

    public function list() {
        parent::authorizing('View List');

        $data = CategoryService::getList();

        return view("admin.project.list", compact('data'));
    }

    public function get_data(Request $request)
    {
        parent::authorizing('View List');

        // SET THIS OBJECT/ITEM NAME BASED ON TRANSLATION
        $this->item = ucwords(lang($this->item, $this->translation));

        // AJAX OR API VALIDATOR
        $validation_rules = [
            // 'division' => 'required'
        ];
        $validator = Validator::make($request->all(), $validation_rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'false',
                'message' => 'Validation Error',
                'data' => $validator->errors()->messages()
            ]);
        }

        // GET THE DATA
        $query = Project::query()->whereNotNull('id');

        // PROVIDE THE DATA
        $data = $query->orderBy('ordinal', 'ASC')->get();

        // MANIPULATE THE DATA
        if (!empty($data)) {
            $categories = Category::query()->pluck('name', 'id');
            foreach ($data as $item) {
                $arrCategoryName = [];
                $projectCategories = Project::getCategoriesByID($item->id, 'category_id');
                $projectCategories->each(function ($item) use (&$arrCategoryName, $categories) {
                    if (in_array($item, array_keys($categories->toArray()))) {
                        $arrCategoryName[] = $categories[$item];
                    }
                });
                $item->created_at_edited = date('Y-m-d H:i:s');
                $item->updated_at_edited = Helper::time_ago(strtotime($item->updated_at), lang('ago', $this->translation), Helper::get_periods($this->translation));
                $item->deleted_at_edited = Helper::time_ago(strtotime($item->deleted_at), lang('ago', $this->translation), Helper::get_periods($this->translation));
                $item->thumbnail_item = asset($item->thumbnail);
                $item->banner_item = asset($item->banner);
                $item->categories = implode(', ', $arrCategoryName);
            }
        }

        // GET HTML
        $html = view('admin.project.table', compact('data'))->render();

        // SUCCESS
        $response = [
            'status' => 'true',
            'message' => 'Successfully get data list',
            'html' => $html,
        ];
        return response()->json($response);
    }

    public function create()
    {
        parent::authorizing('Add New');

        return view('admin.project.form');
    }

    public function do_create(Request $request)
    {
        parent::authorizing('Add New');

        // SET THIS OBJECT/ITEM NAME BASED ON TRANSLATION
        $this->item = ucwords(lang($this->item, $this->translation));

        // INSERT NEW DATA
        \DB::beginTransaction();
        $data = new Project();

        // LARAVEL VALIDATION
        $validation = [
            'name' => 'required|max:191',
            'path' => 'required|unique:projects,path',
            'category_id' => 'required',
        ];
        $message = [
            'required' => ':attribute ' . lang('field is required', $this->translation),
            'unique' => ':attribute ' . lang('field is duplicate', $this->translation),
        ];
        $names = [
            'name' => ucwords(lang('name', $this->translation)),
            'path' => ucwords(lang('path', $this->translation)),
            'category_id' => ucwords(lang('category_id', $this->translation)),
        ];
        $this->validate($request, $validation, $message, $names);
        if ($request->banner) {
            // PROCESSING IMAGE
            $dir_path = 'uploads/banner/';
            $image_file = $request->file('banner');
            $format_image_name = time() . '-banner';
            $image = Helper::upload_image($dir_path, $image_file, true, $format_image_name);
            if ($image['status'] != 'true') {
                return back()
                    ->withInput()
                    ->with('error', lang($image['message'], $this->translation, $image['dynamic_objects']));
            }
            // GET THE UPLOADED IMAGE RESULT
            $data->banner = $dir_path . $image['data'];
        }
        if ($request->thumbnail) {
            // PROCESSING IMAGE
            $dir_path = 'uploads/thumbnail/';
            $image_file = $request->file('thumbnail');
            $format_image_name = time() . '-thumbnail';
            $image = Helper::upload_image($dir_path, $image_file, true, $format_image_name);
            if ($image['status'] != 'true') {
                return back()
                    ->withInput()
                    ->with('error', lang($image['message'], $this->translation, $image['dynamic_objects']));
            }
            // GET THE UPLOADED IMAGE RESULT
            $data->thumbnail = $dir_path . $image['data'];
        }
        $meta_data = [];
        if ($request->meta_data) {
            foreach ($request->meta_data as $item) {
                $meta_data[] = [
                    $item['name'] => $item['value']
                ];
            }
        }
        $data->meta_data = json_encode($meta_data);
        $data->name = Helper::validate_input_text($request->name);
        $data->status = (int) $request->status;
        $data->content = $request->get('content');
        $data->path = $request->path;

        // SAVE THE DATA
        if ($data->save()) {
            if ($request->category_id) {
                foreach ($request->category_id as $item) {
                    $relate = new ProjectRelate();
                    $relate->project_id = $data->id;
                    $relate->category_id = $item;
                    $relate->save();
                }
            }
            if ($request->images) {
                $images = $request->images;
                foreach ($images as $image_file) {
                    $dir_path = "uploads/project-images/$data->id/";
                    $format_image_name = time() . '-' . rand(1, 9999) . '-images';
                    $image = Helper::upload_image($dir_path, $image_file, true, $format_image_name);
                    if ($image['status'] != 'true') {
                        return back()
                            ->withInput()
                            ->with('error', lang($image['message'], $this->translation, $image['dynamic_objects']));
                    }
                    $projectImage = new ProjectImage();
                    $projectImage->project_id = $data->id;
                    $projectImage->url = $dir_path . $image['data'];
                    $projectImage->save();
                }
            }
            // SUCCESS
            \DB::commit();
            return redirect()
                ->route('admin.project.list')
                ->with('success', lang('Successfully added a new #item', $this->translation, ['#item' => $this->item]));
        }

        // FAILED
        \DB::rollBack();
        return back()
            ->withInput()
            ->with('error', lang('Oops, failed to add a new #item. Please try again.', $this->translation, ['#item' => $this->item]));
    }

    public function edit($id)
    {

        parent::authorizing('View Details');

        // SET THIS OBJECT/ITEM NAME BASED ON TRANSLATION
        $this->item = ucwords(lang($this->item, $this->translation));

        // CHECK OBJECT ID
        if ((int) $id < 1) {
            // INVALID OBJECT ID
            return redirect()
                ->route('admin.project.list')
                ->with('error', lang('#item ID is invalid, please recheck your link again', $this->translation, ['#item' => $this->item]));
        }

        // GET THE DATA BASED ON ID
        $data = Project::query()->find($id);

        // CHECK IS DATA FOUND
        if (!$data) {
            // DATA NOT FOUND
            return redirect()
                ->route('admin.project.list')
                ->with('error', lang('#item not found, please recheck your link again', $this->translation, ['#item' => $this->item]));
        }
        $data->category_id = Project::getCategoriesByID($id, 'category_id');
        $data->images = Project::getImagesByID($id, 'url');
        return view('admin.project.form', compact('data'));
    }

    public function do_edit($id, Request $request)
    {
        parent::authorizing('Edit');

        // SET THIS OBJECT/ITEM NAME BASED ON TRANSLATION
        $this->item = ucwords(lang($this->item, $this->translation));

        // CHECK OBJECT ID
        if ((int) $id < 1) {
            // INVALID OBJECT ID
            return redirect()
                ->route('admin.project.list')
                ->with('error', lang('#item ID is invalid, please recheck your link again', $this->translation, ['#item' => $this->item]));
        }

        // GET THE DATA BASED ON ID
        \DB::beginTransaction();
        $data = Project::query()->find($id);

        // CHECK IS DATA FOUND
        if (!$data) {
            // DATA NOT FOUND
            return back()
                ->withInput()
                ->with('error', lang('#item not found, please reload your page before resubmit', $this->translation, ['#item' => $this->item]));
        }

        // LARAVEL VALIDATION
        $validation = [
            'name' => 'required|max:191',
            'path' => 'required|unique:projects,path',
            'category_id' => 'required',
        ];
        $message = [
            'required' => ':attribute ' . lang('field is required', $this->translation),
            'unique' => ':attribute ' . lang('field is duplicate', $this->translation),
        ];
        $names = [
            'name' => ucwords(lang('name', $this->translation)),
            'path' => ucwords(lang('path', $this->translation)),
            'category_id' => ucwords(lang('category_id', $this->translation)),
        ];
        $this->validate($request, $validation, $message, $names);
        if ($request->banner) {
            // PROCESSING IMAGE
            $dir_path = 'uploads/banner/';
            $image_file = $request->file('banner');
            $format_image_name = time() . '-banner';
            $image = Helper::upload_image($dir_path, $image_file, true, $format_image_name);
            if ($image['status'] != 'true') {
                return back()
                    ->withInput()
                    ->with('error', lang($image['message'], $this->translation, $image['dynamic_objects']));
            }
            // GET THE UPLOADED IMAGE RESULT
            $data->banner = $dir_path . $image['data'];
        }
        if ($request->thumbnail) {
            // PROCESSING IMAGE
            $dir_path = 'uploads/thumbnail/';
            $image_file = $request->file('thumbnail');
            $format_image_name = time() . '-thumbnail';
            $image = Helper::upload_image($dir_path, $image_file, true, $format_image_name);
            if ($image['status'] != 'true') {
                return back()
                    ->withInput()
                    ->with('error', lang($image['message'], $this->translation, $image['dynamic_objects']));
            }
            // GET THE UPLOADED IMAGE RESULT
            $data->thumbnail = $dir_path . $image['data'];
        }

        if ($request->images) {
            $images = $request->images;
            ProjectImage::query()->where(['project_id' => $id])->delete();
            foreach ($images as $image_file) {
                $dir_path = "uploads/project-images/$id/";
                $format_image_name = time() . '-' . rand(1, 9999) . '-images';
                $image = Helper::upload_image($dir_path, $image_file, true, $format_image_name);
                if ($image['status'] != 'true') {
                    return back()
                        ->withInput()
                        ->with('error', lang($image['message'], $this->translation, $image['dynamic_objects']));
                }
                $projectImage = new ProjectImage();
                $projectImage->project_id = $data->id;
                $projectImage->url = $dir_path . $image['data'];
                $projectImage->save();
            }
        }
        $meta_data = [];
        if ($request->meta_data) {
            foreach ($request->meta_data as $item) {
                $meta_data[] = [
                    $item['name'] => $item['value']
                ];
            }
        }
        $data->meta_data = json_encode($meta_data);
        // HELPER VALIDATION FOR PREVENT SQL INJECTION & XSS ATTACK
        $data->name = Helper::validate_input_text($request->name);
        $data->status = (int) $request->status;
        $data->content = $request->get('content');
        $data->path = $request->path;
        $data->external_url = $request->external_url;

        // UPDATE THE DATA
        if ($data->save()) {
            // SUCCESS
            $requestCategory = $request->category_id;
            array_walk($requestCategory, function (&$value) {
                $value = intval($value);
            });
            $projectCategory = Project::getCategoriesByID($id, 'category_id');
            $requestCategory = collect($requestCategory);
            if ($projectCategory->diff($requestCategory)->isNotEmpty()) {
                foreach ($projectCategory->diff($requestCategory) as $categoryId) {
                    ProjectRelate::query()->where(['category_id' => $categoryId])->delete();
                }
            }
            if ($requestCategory->diff($projectCategory)->isNotEmpty()) {
                foreach ($requestCategory->diff($projectCategory) as $item) {
                    $relate = new ProjectRelate();
                    $relate->project_id = $data->id;
                    $relate->category_id = $item;
                    $relate->save();
                }
            }
            DB::commit();
            return redirect()
                ->route('admin.project.edit', $id)
                ->with('success', lang('Successfully updated #item', $this->translation, ['#item' => $this->item]));
        }

        // FAILED
        DB::rollBack();
        return back()
            ->withInput()
            ->with('error', lang('Oops, failed to update #item. Please try again.', $this->translation, ['#item' => $this->item]));
    }

    public function sorting(Request $request)
    {
        // AJAX OR API VALIDATOR
        $validation_rules = [
            'rows' => 'required'
        ];

        $validator = Validator::make($request->all(), $validation_rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'false',
                'message' => 'Validation Error',
                'data' => $validator->errors()->messages()
            ]);
        }

        // JSON Array - sample: row[]=2&row[]=1&row[]=3
        $rows = $request->input('rows');

        // convert to array
        $data = explode('&', $rows);

        $ordinal = 1;
        foreach ($data as $item) {
            // split the data
            $tmp = explode('[]=', $item);

            $object = Project::query()->find($tmp[1]);
            $object->ordinal = $ordinal;
            $object->save();

            $ordinal++;
        }

        // SUCCESS
        $response = [
            'status' => 'true',
            'message' => 'Successfully rearranged data',
            'data' => $data
        ];
        return response()->json($response, 200);
    }

    public function delete(Request $request)
    {
        parent::authorizing('Delete');

        // SET THIS OBJECT/ITEM NAME BASED ON TRANSLATION
        $this->item = ucwords(lang($this->item, $this->translation));

        $id = $request->id;

        // CHECK OBJECT ID
        if ((int) $id < 1) {
            // INVALID OBJECT ID
            return redirect()
                ->route('admin.project.list')
                ->with('error', lang('#item ID is invalid, please recheck your link again', $this->translation, ['#item' => $this->item]));
        }

        // GET THE DATA BASED ON ID
        $data = Project::query()->find($id);

        // CHECK IS DATA FOUND
        if (!$data) {
            // DATA NOT FOUND
            return redirect()
                ->route('admin.project.list')
                ->with('error', lang('#item not found, please recheck your link again', $this->translation, ['#item' => $this->item]));
        }

        // DELETE THE DATA
        if ($data->delete()) {
            // SUCCESS
            return redirect()
                ->route('admin.project.list')
                ->with('success', lang('Successfully deleted #item', $this->translation, ['#item' => $this->item]));
        }

        // FAILED
        return back()
            ->with('error', lang('Oops, failed to delete #item. Please try again.', $this->translation, ['#item' => $this->item]));
    }

    public function list_deleted()
    {
        parent::authorizing('Restore');

        return view('admin.project.list');
    }

    public function get_data_deleted(Request $request)
    {
        parent::authorizing('View List');

        // SET THIS OBJECT/ITEM NAME BASED ON TRANSLATION
        $this->item = ucwords(lang($this->item, $this->translation));

        // AJAX OR API VALIDATOR
        $validation_rules = [
            // 'division' => 'required'
        ];
        $validator = Validator::make($request->all(), $validation_rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'false',
                'message' => 'Validation Error',
                'data' => $validator->errors()->messages()
            ]);
        }

        // GET THE DATA
        $query = Project::onlyTrashed();

        // PROVIDE THE DATA
        $data = $query->get();

        // MANIPULATE THE DATA
        if (!empty($data)) {
            $categories = Category::query()->pluck('name', 'id');
            foreach ($data as $item) {
                $arrCategoryName = [];
                $projectCategories = Project::getCategoriesByID($item->id, 'category_id');
                $projectCategories->each(function ($item) use (&$arrCategoryName, $categories) {
                    if (in_array($item, array_keys($categories->toArray()))) {
                        $arrCategoryName[] = $categories[$item];
                    }
                });
                $item->created_at_edited = date('Y-m-d H:i:s');
                $item->updated_at_edited = Helper::time_ago(strtotime($item->updated_at), lang('ago', $this->translation), Helper::get_periods($this->translation));
                $item->deleted_at_edited = Helper::time_ago(strtotime($item->deleted_at), lang('ago', $this->translation), Helper::get_periods($this->translation));
                $item->thumbnail_item = asset($item->thumbnail);
                $item->banner_item = asset($item->banner);
                $item->categories = implode(', ', $arrCategoryName);
            }
        }

        // GET HTML
        $restore = true;
        $html = view('admin.project.table', compact('data', 'restore'))->render();

        // SUCCESS
        $response = [
            'status' => 'true',
            'message' => 'Successfully get data list',
            'html' => $html
        ];
        return response()->json($response);
    }

    public function restore(Request $request)
    {
        parent::authorizing('Restore');

        // SET THIS OBJECT/ITEM NAME BASED ON TRANSLATION
        $this->item = ucwords(lang($this->item, $this->translation));

        $id = $request->id;

        // CHECK OBJECT ID
        if ((int) $id < 1) {
            // INVALID OBJECT ID
            return redirect()
                ->route('admin.project.deleted')
                ->with('error', lang('#item ID is invalid, please recheck your link again', $this->translation, ['#item' => $this->item]));
        }

        // GET THE DATA BASED ON ID
        $data = Project::onlyTrashed()->find($id);

        // CHECK IS DATA FOUND
        if (!$data) {
            // DATA NOT FOUND
            return redirect()
                ->route('admin.project.deleted')
                ->with('error', lang('#item not found, please recheck your link again', $this->translation, ['#item' => $this->item]));
        }

        // RESTORE THE DATA
        if ($data->restore()) {
            // SUCCESS
            return redirect()
                ->route('admin.project.deleted')
                ->with('success', lang('Successfully restored #item', $this->translation, ['#item' => $this->item]));
        }

        // FAILED
        return back()
            ->with('error', lang('Oops, failed to restore #item. Please try again.', $this->translation, ['#item' => $this->item]));
    }
}

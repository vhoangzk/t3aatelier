<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Libraries\Helper;
use App\Models\Category;
use App\Services\Admin\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    protected $module = 'Category';
    private $item = 'category';

    public function list() {
        parent::authorizing('View List');

        $data = CategoryService::getList();

        return view('admin.category.list', compact('data'));
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
        $query = Category::query()->whereNotNull('id');

        // PROVIDE THE DATA
        $data = $query->orderBy('ordinal')->get();

        // MANIPULATE THE DATA
        if (!empty($data)) {
            foreach ($data as $item) {
                $item->created_at_edited = date('Y-m-d H:i:s');
                $item->updated_at_edited = Helper::time_ago(strtotime($item->updated_at), lang('ago', $this->translation), Helper::get_periods($this->translation));
                $item->deleted_at_edited = Helper::time_ago(strtotime($item->deleted_at), lang('ago', $this->translation), Helper::get_periods($this->translation));
            }
        }

        // GET HTML
        $html = view('admin.category.table', compact('data'))->render();

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

        return view('admin.category.form');
    }

    public function do_create(Request $request)
    {
        parent::authorizing('Add New');

        // SET THIS OBJECT/ITEM NAME BASED ON TRANSLATION
        $this->item = ucwords(lang($this->item, $this->translation));

        // INSERT NEW DATA
        $data = new Category();

        // LARAVEL VALIDATION
        $validation = [
            'name' => 'required|max:191',
            'path' => 'required|unique:categories,path',
        ];
        $message = [
            'required' => ':attribute ' . lang('field is required', $this->translation),
            'unique' => ':attribute ' . lang('field is duplicate', $this->translation),
        ];
        $names = [
            'image' => ucwords(lang('image', $this->translation)),
            'path' => ucwords(lang('path', $this->translation)),
        ];
        $this->validate($request, $validation, $message, $names);

        $data->name = Helper::validate_input_text($request->name);
        $data->status = (int) $request->status;
        $data->path = $request->path;

        // SET ORDER / ORDINAL
        $last = Category::query()->select('ordinal')->orderBy('ordinal', 'desc')->first();
        $ordinal = 1;
        if ($last) {
            $ordinal = $last->ordinal + 1;
        }
        $data->ordinal = $ordinal;

        // SAVE THE DATA
        if ($data->save()) {
            // SUCCESS
            return redirect()
                ->route('admin.category.list')
                ->with('success', lang('Successfully added a new #item', $this->translation, ['#item' => $this->item]));
        }

        // FAILED
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
                ->route('admin.category.list')
                ->with('error', lang('#item ID is invalid, please recheck your link again', $this->translation, ['#item' => $this->item]));
        }

        // GET THE DATA BASED ON ID
        $data = Category::query()->find($id);

        // CHECK IS DATA FOUND
        if (!$data) {
            // DATA NOT FOUND
            return redirect()
                ->route('admin.category.list')
                ->with('error', lang('#item not found, please recheck your link again', $this->translation, ['#item' => $this->item]));
        }

        return view('admin.category.form', compact('data'));
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
                ->route('admin.category.list')
                ->with('error', lang('#item ID is invalid, please recheck your link again', $this->translation, ['#item' => $this->item]));
        }

        // GET THE DATA BASED ON ID
        $data = Category::query()->find($id);

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
            'path' => [
                'required',
                Rule::unique('categories', 'path')->ignore($data->id),
            ],
        ];
        $message = [
            'required' => ':attribute ' . lang('field is required', $this->translation),
            'unique' => ':attribute ' . lang('field is duplicate', $this->translation),
        ];
        $names = [
            'name' => ucwords(lang('name', $this->translation)),
            'path' => ucwords(lang('path', $this->translation)),
        ];
        $this->validate($request, $validation, $message, $names);

        // HELPER VALIDATION FOR PREVENT SQL INJECTION & XSS ATTACK
        $data->name = Helper::validate_input_text($request->name);
        $data->status = (int) $request->status;
        $data->path = $request->path;

        // UPDATE THE DATA
        if ($data->save()) {
            // SUCCESS
            return redirect()
                ->route('admin.category.edit', $id)
                ->with('success', lang('Successfully updated #item', $this->translation, ['#item' => $this->item]));
        }

        // FAILED
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

            $object = Category::query()->find($tmp[1]);
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
                ->route('admin.category.list')
                ->with('error', lang('#item ID is invalid, please recheck your link again', $this->translation, ['#item' => $this->item]));
        }

        // GET THE DATA BASED ON ID
        $data = Category::query()->find($id);

        // CHECK IS DATA FOUND
        if (!$data) {
            // DATA NOT FOUND
            return redirect()
                ->route('admin.category.list')
                ->with('error', lang('#item not found, please recheck your link again', $this->translation, ['#item' => $this->item]));
        }

        // DELETE THE DATA
        if ($data->delete()) {
            // SUCCESS
            return redirect()
                ->route('admin.category.list')
                ->with('success', lang('Successfully deleted #item', $this->translation, ['#item' => $this->item]));
        }

        // FAILED
        return back()
            ->with('error', lang('Oops, failed to delete #item. Please try again.', $this->translation, ['#item' => $this->item]));
    }

    public function list_deleted()
    {
        parent::authorizing('Restore');

        return view('admin.category.list');
    }

    public function get_data_deleted(Request $request)
    {
        // AUTHORIZING...
        $authorize = Helper::authorizing($this->module, 'View List');
        if ($authorize['status'] != 'true') {
            return response()->json([
                'status' => 'false',
                'message' => $authorize['message']
            ]);
        }

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
        $query = Category::onlyTrashed();

        // PROVIDE THE DATA
        $data = $query->orderBy('ordinal')->get();

        // MANIPULATE THE DATA
        if (!empty($data)) {
            foreach ($data as $item) {
                $item->created_at_edited = date('Y-m-d H:i:s');
                $item->updated_at_edited = Helper::time_ago(strtotime($item->updated_at), lang('ago', $this->translation), Helper::get_periods($this->translation));
                $item->deleted_at_edited = Helper::time_ago(strtotime($item->deleted_at), lang('ago', $this->translation), Helper::get_periods($this->translation));
            }
        }

        // GET HTML
        $restore = true;
        $html = view('admin.category.table', compact('data', 'restore'))->render();

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
                ->route('admin.category.deleted')
                ->with('error', lang('#item ID is invalid, please recheck your link again', $this->translation, ['#item' => $this->item]));
        }

        // GET THE DATA BASED ON ID
        $data = Category::onlyTrashed()->find($id);

        // CHECK IS DATA FOUND
        if (!$data) {
            // DATA NOT FOUND
            return redirect()
                ->route('admin.category.deleted')
                ->with('error', lang('#item not found, please recheck your link again', $this->translation, ['#item' => $this->item]));
        }

        // RESTORE THE DATA
        if ($data->restore()) {
            // SUCCESS
            return redirect()
                ->route('admin.category.deleted')
                ->with('success', lang('Successfully restored #item', $this->translation, ['#item' => $this->item]));
        }

        // FAILED
        return back()
            ->with('error', lang('Oops, failed to restore #item. Please try again.', $this->translation, ['#item' => $this->item]));
    }
}

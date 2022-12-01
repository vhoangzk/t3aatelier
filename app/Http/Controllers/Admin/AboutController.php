<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Libraries\Helper;
use App\Models\About;
use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\ProjectRelate;
use App\Services\Admin\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AboutController extends Controller
{
    protected $module = 'About';
    private $item = 'about';

    public function edit()
    {
        parent::authorizing('View Details');
        $data = About::query()->firstOrFail();
        return view("admin.about.form", compact('data'));
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
                ->route('admin.about.form')
                ->with('error', lang('#item ID is invalid, please recheck your link again', $this->translation, ['#item' => $this->item]));
        }

        // GET THE DATA BASED ON ID
        \DB::beginTransaction();
        $data = About::query()->find($id);
        // CHECK IS DATA FOUND
        if (!$data) {
            // DATA NOT FOUND
            return back()
                ->withInput()
                ->with('error', lang('#item not found, please reload your page before resubmit', $this->translation, ['#item' => $this->item]));
        }

        // LARAVEL VALIDATION
        $validation = [
            'title' => 'required|max:191',
            'content' => 'required',
        ];
        $message = [
            'required' => ':attribute ' . lang('field is required', $this->translation),
            'unique' => ':attribute ' . lang('field is duplicate', $this->translation),
        ];
        $names = [
            'title' => ucwords(lang('title', $this->translation)),
            'content' => ucwords(lang('content', $this->translation)),
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
        $meta_data = [];
        if ($request->meta_data) {
            foreach ($request->meta_data as $item) {
                if (!empty($item['name']) && !empty($item['value'])) {
                    $meta_data[] = [
                        'name' => $item['name'],
                        'value' => $item['value'],
                    ];
                }
            }
        }
        $data->meta = json_encode($meta_data);
        // HELPER VALIDATION FOR PREVENT SQL INJECTION & XSS ATTACK
        $data->title = Helper::validate_input_text($request->title);
        $data->content = $request->get('content');
        $data->email_to = $request->get('email_to');

        // UPDATE THE DATA
        if ($data->save()) {
            // SUCCESS
            DB::commit();
            return redirect()
                ->route('admin.about')
                ->with('success', lang('Successfully updated #item', $this->translation, ['#item' => $this->item]));
        }

        // FAILED
        DB::rollBack();
        return back()
            ->withInput()
            ->with('error', lang('Oops, failed to update #item. Please try again.', $this->translation, ['#item' => $this->item]));
    }
}

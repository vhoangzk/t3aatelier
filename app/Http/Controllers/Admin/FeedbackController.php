<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Libraries\Helper;
use App\Models\About;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\ProjectRelate;
use App\Services\Admin\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FeedbackController extends Controller
{
    protected $module = 'Feedback';
    private $item = 'feedback';

    public function list()
    {
        // AUTHORIZING...
        $authorize = Helper::authorizing($this->module, 'View List');
        if ($authorize['status'] != 'true') {
            return back()->with('error', $authorize['message']);
        }

        // FOR DISPLAY ACTIVE DATA
        $data = true;

        return view('admin.feedback.list', compact('data'));
    }

    public function get_data(Request $request)
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
        $query = Feedback::query()->whereNotNull('id');

        // PROVIDE THE DATA
        $data = $query->get();

        // MANIPULATE THE DATA
        if (!empty($data)) {
            foreach ($data as $item) {
                $item->created_at_edited = Helper::time_ago(strtotime($item->created_at), lang('ago', $this->translation), Helper::get_periods($this->translation));
            }
        }

        // GET HTML
        $html = view('admin.feedback.table', compact('data'))->render();

        // SUCCESS
        $response = [
            'status' => 'true',
            'message' => 'Successfully get data list',
            'html' => $html
        ];
        return response()->json($response, 200);
    }
}

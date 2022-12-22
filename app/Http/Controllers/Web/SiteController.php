<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Project;
use App\Services\HomeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Generator;

// LIBRARIES
use App\Libraries\Helper;

// MODELS
use App\Models\Product;
use App\Models\Article;
use App\Models\Topic;

class SiteController extends Controller
{
    public function redirect()
    {
        return redirect()->route('web.home');
    }

    public function home()
    {
        $page_menu = 'home';

        $banners = HomeService::getHomeBanners();

        $categories = HomeService::getHomeCategories();

        $projects = HomeService::getHomeProjects();

        return view('web.home', compact('page_menu',  'banners', 'categories', 'projects'));
    }

    public function projectDetail($path) {
        $project = Project::query()
            ->with('images')
            ->where(['path' => $path])
            ->firstOrFail();
        $prevProject = Project::query()->inRandomOrder()->whereKeyNot($project->id)->first();
        $nextProject = Project::query()->inRandomOrder();
        if ($prevProject) {
            $nextProject->whereKeyNot($prevProject->id);
        }
        $nextProject = $nextProject->whereKeyNot($project->id)->first();
        return view('web.pages.projects.details', compact('project', 'prevProject', 'nextProject'));
    }

    public function about() {
        $data = About::query()->firstOrFail();
        return view('web.pages.about.index', compact('data'));
    }

    public function sendEmailContact(Request $request) {
        $name = htmlspecialchars($request->get('idi_name'));
        $email = htmlspecialchars($request->get('idi_mail'));
        $content = htmlspecialchars($request->get('idi_text'));

        $feedback = new Feedback();
        $feedback->name = $name;
        $feedback->email = $email;
        $feedback->content = $content;
        $feedback->save();

        return response()->json([
            'result' => true,
        ]);
    }

    public function blog(Request $request)
    {
        $page_menu = 'blog';

        // GET THE DATA
        $data = Article::select(
            'articles.slug',
            'articles.title',
            'articles.thumbnail',
            'articles.summary',
            'articles.posted_at',
            'articles.author'
        )
            ->leftJoin('article_topic', 'articles.id', '=', 'article_topic.article_id')
            ->leftJoin('topics', 'article_topic.topic_id', '=', 'topics.id')
            ->where('articles.status', 1)
            ->orderBy('articles.posted_at', 'desc')
            ->groupBy(
                'articles.slug',
                'articles.title',
                'articles.thumbnail',
                'articles.summary',
                'articles.posted_at',
                'articles.author'
            );

        // FILTER BY TOPIC
        if ($request->topic) {
            $topic = Helper::validate_input_text($request->topic);
            $data->where('topics.name', $topic);
        }

        // FILTER BY KEYWORD
        if ($request->keyword) {
            $keyword = Helper::validate_input_text($request->keyword);
            $data->where(function ($query_where) use ($keyword) {
                $query_where->where('articles.title', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('articles.keywords', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('articles.summary', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('articles.content', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('topics.name', 'LIKE', '%' . $keyword . '%');
            });
        }

        // FILTER BY AUTHOR
        if ($request->author) {
            $author = Helper::validate_input_text($request->author);
            $data->where('articles.author', $author);
        }

        // GET TOTAL DATA
        $query = $data;
        $total = $query->get()->count();

        // PAGINATION
        $limit = 3;
        $page = 1;
        if ((int) $request->page) {
            $page = (int) $request->page;
        }
        if ($page < 1) {
            $page = 1;
        }
        $skip = ($page - 1) * $limit;

        $data = $data
            ->take($limit)
            ->skip($skip)
            ->get();

        // GET TOPIC
        $topics = Topic::where('status', 1)
            ->orderBy('name')
            ->get();

        // GENERATE QR CODE
        $qrcode_gen = new Generator;
        $qrcode = $qrcode_gen->size(200)
            ->generate('https://github.com/vickzkater/lara-s-cms');

        return view('web.blog', compact('page_menu', 'data', 'topics', 'qrcode'));
    }

    public function blog_details($slug)
    {
        $page_menu = 'blog';

        // GET THE DATA
        $data = Article::select(
            'articles.slug',
            'articles.title',
            'articles.thumbnail',
            'articles.posted_at',
            'articles.author',
            'articles.summary',
            'articles.content',
            DB::raw('GROUP_CONCAT(topics.name SEPARATOR " | ") AS topics')
        )
            ->leftJoin('article_topic', 'articles.id', '=', 'article_topic.article_id')
            ->leftJoin('topics', 'article_topic.topic_id', '=', 'topics.id')
            ->where('articles.status', 1)
            ->where('articles.slug', $slug)
            ->orderBy('articles.posted_at', 'desc')
            ->groupBy(
                'articles.slug',
                'articles.title',
                'articles.thumbnail',
                'articles.posted_at',
                'articles.author',
                'articles.summary',
                'articles.content'
            )
            ->first();

        // GET TOPIC
        $topics = Topic::where('status', 1)
            ->orderBy('name')
            ->get();

        // GENERATE QRCODE - https://www.simplesoftware.io/#/docs/simple-qrcode
        $qrcode_gen = new Generator;
        $qrcode = $qrcode_gen->size(200)
            ->generate(route('web.blog', $data->slug));

        $qrcode_gen = new Generator;
        $qrcode_main = $qrcode_gen->size(200)
            ->generate('https://github.com/vickzkater/lara-s-cms');

        return view('web.blog_details', compact('page_menu', 'data', 'topics', 'qrcode', 'qrcode_main'));
    }
}

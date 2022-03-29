<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Video;
use App\Repo\NewsCategoryRepo;
use App\Repo\NewsRepo;
use Illuminate\Http\Request;
use Modules\News\Entities\News;
use Modules\News\Entities\NewsSubCategory;

class NewsController extends Controller
{
    /**
     * @var NewsCategoryRepo
     */
    private $newsCategoryRepo;
    /**
     * @var NewsRepo
     */
    private $newsRepo;

    /**
     * NewsController constructor.
     * @param NewsCategoryRepo $newsCategoryRepo
     * @param NewsRepo $newsRepo
     */
    public function __construct(NewsCategoryRepo $newsCategoryRepo, NewsRepo $newsRepo)
    {
        $this->newsCategoryRepo = $newsCategoryRepo;
        $this->newsRepo = $newsRepo;
    }

    public function findCat($slug)
    {
        try {
            $cat = $this->newsCategoryRepo->findBySlug($slug);
            if ($cat) {
                $newsList = $this->newsRepo->allNewsByCategorySlug($cat->id);
                $ads = Advertisement::where(['page' => 3, 'status' => 1])->get();
                return view('frontend.newsCategory', compact('cat', 'newsList', 'ads'));
            }
            return back();
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION:' . $exception);
            return back();
        }
    }


    public function findSubCat($slug)
    {
        try {
            $subCat = NewsSubCategory::where('slug', $slug)->first();
            $newsList = $this->newsRepo->allNewsBySubCategorySlug($subCat->id);
            $ads = Advertisement::where(['page' => 4, 'status' => 1])->get();
            return view('frontend.newsSubCategory', compact('subCat', 'ads', 'newsList'));
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION:' . $exception);
            return back();
        }
    }

    public function getsAds()
    {
        $ads = Advertisement::where(['page' => 2, 'status' => 1])->get();
        return response()->json($ads);
    }

    public function newsDetail($slug1, $slug2, $slug3, $slug4)
    {
        try {
            $slug = $slug1 . '/' . $slug2 . '/' . $slug3 . '/' . $slug4;
            $news = $this->newsRepo->findBySlug($slug);
            if ($news) {
                $ads = Advertisement::where(['page' => 2, 'status' => 1])->get();
                $news->share += 1;
                $news->save();
                return view('frontend.newsDetail', compact('news', 'ads'));
            }
            return redirect('/');
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION:' . $exception);
            return back();
        }
    }

    public function displayAllVideos()
    {
        $videos = Video::latest()->paginate(15);
        $ads = Advertisement::where(['page' => 3, 'status' => 1])->get();
        return view('frontend.video', compact('videos', 'ads'));
    }

    public function searchNews(Request $request)
    {
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $news = News::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('highlight_text', 'LIKE', "%{$search}%")
            ->get();
        $ads = Advertisement::where(['page' => 2, 'status' => 1])->get();

        return view('frontend.searchresult', compact('news', 'ads'));

    }

}

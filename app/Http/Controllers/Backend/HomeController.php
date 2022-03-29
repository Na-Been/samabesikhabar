<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Live;
use App\Models\User;
use App\Repo\AdvertisementRepo;
use App\Repo\BlogCategoryRepo;
use App\Repo\BlogRepo;
use App\Repo\NewsCategoryRepo;
use App\Repo\NewsRepo;
use App\Repo\VideoRepo;
use Illuminate\Http\Request;
use Modules\News\Entities\NewsSubCategory;
use Modules\Page\Entities\Page;
use Modules\Team\Entities\Team;


class HomeController extends Controller
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
     * @var BlogRepo
     */
    private $blogRepo;
    /**
     * @var BlogCategoryRepo
     */
    private $blogCategoryRepo;
    /**
     * @var AdvertisementRepo
     */
    private $advertisementRepo;
    /**
     * @var VideoRepo
     */
    private $videoRepo;

    /**
     * HomeController constructor.
     * @param NewsCategoryRepo $newsCategoryRepo
     * @param NewsRepo $newsRepo
     * @param BlogRepo $blogRepo
     * @param AdvertisementRepo $advertisementRepo
     * @param VideoRepo $videoRepo
     * @param BlogCategoryRepo $blogCategoryRepo
     */
    public function __construct(
        NewsCategoryRepo $newsCategoryRepo,
        NewsRepo $newsRepo,
        BlogRepo $blogRepo,
        AdvertisementRepo $advertisementRepo,
        VideoRepo $videoRepo,
        BlogCategoryRepo $blogCategoryRepo)
    {
        $this->newsCategoryRepo = $newsCategoryRepo;
        $this->newsRepo = $newsRepo;
        $this->blogRepo = $blogRepo;
        $this->blogCategoryRepo = $blogCategoryRepo;
        $this->advertisementRepo = $advertisementRepo;
        $this->videoRepo = $videoRepo;
    }

    public function index()
    {
        $newsCatCount = $this->newsCategoryRepo->getCount();
        $newsSubCat = NewsSubCategory::count();
        $newsCount = $this->newsRepo->getCount();
        $teamMember = Team::count();
        $videoCount = $this->videoRepo->getCount();
        $adCount = $this->advertisementRepo->getCount();
        $pages = Page::count();
        $users = User::count();
        return view('backend.dashboard', compact('newsCatCount', 'newsCount', 'newsSubCat',
            'teamMember', 'videoCount', 'adCount', 'pages', 'users'));
    }

    public function showLivePage()
    {
        $videos = Live::all();
        return view('backend.lives.index', compact('videos'));
    }

    public function showLiveCreatePage()
    {
        return view('backend.lives.create');
    }

    public function storeLink(Request $request)
    {
        $inputs = $request->validate([
            'title' => 'required',
            'url' => 'required',
            'status' => 'required'
        ]);
        try {
            Live::create($inputs);
            return redirect()->route('add.live.link')->with('success', 'Link Added Successfully');
        } catch (\Exception $exception) {
            return back()->with('failed', 'Cannot Add Live Video');
        }
    }

    public function showLiveUpdatePage($id)
    {
        $live = Live::whereId($id)->first();
        return view('backend.lives.edit', compact('live'));
    }

    public function updateLink(Request $request, $id)
    {
        $inputs = $request->validate([
            'title' => 'required',
            'url' => 'required',
            'status' => 'required'
        ]);
        $findData = Live::whereId($id)->first();
        try {
            $findData->update($inputs);
            return redirect()->route('add.live.link')->with('success', 'Link Updated Successfully');
        } catch (\Exception $exception) {
            return back()->with('failed', 'Cannot Updated Live Video');
        }
    }

    public function deleteLink($id)
    {
        try {
            $findData = Live::whereId($id)->first();
            $findData->delete();
            return redirect()->route('add.live.link')->with('success', 'Link Deleted Successfully');
        } catch (\Exception $exception) {
            return back()->with('failed', 'Cannot Delete Live Video');
        }
    }

    public function changeLiveStatus($id)
    {
        $value = Live::findOrFail($id);
        Live::whereId($id)
            ->update(['status' => ($value->status == '1') ? '0' : '1']);
    }
}

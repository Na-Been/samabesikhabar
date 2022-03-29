<?php


namespace App\View;

use App\Models\Live;
use App\Repo\NewsCategoryRepo;
use App\Repo\PageRepo;
use Illuminate\View\View;


class FrontComposer
{
    /**
     * @var NewsCategoryRepo
     */
    private $newsCategoryRepo;
    /**
     * @var PageRepo
     */
    private $pageRepo;

    /**
     * FrontComposer constructor.
     * @param NewsCategoryRepo $newsCategoryRepo
     * @param PageRepo $pageRepo
     */
    public function __construct(NewsCategoryRepo $newsCategoryRepo, PageRepo $pageRepo)
    {
        $this->newsCategoryRepo = $newsCategoryRepo;
        $this->pageRepo = $pageRepo;
    }

    public function compose(View $view)
    {
        $pages = $this->pageRepo->getParentPages();
        $newsCats = $this->newsCategoryRepo->getAll();
        $newsCategory = $this->newsCategoryRepo->getAll();
        $liveLink = Live::where('status', 1)->latest()->first();
        $view->with('pages', $pages);
        $view->with('newsCats', $newsCats);
        $view->with('newsCategory', $newsCategory);
        $view->with('liveLinks', $liveLink);

    }
}

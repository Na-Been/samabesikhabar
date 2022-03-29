<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Repo\AdvertisementRepo;
use App\Repo\NewsCategoryRepo;
use App\Repo\NewsRepo;

class HomeController extends Controller
{
    /**
     * @var AdvertisementRepo
     */
    private $advertisementRepo;
    /**
     * @var NewsRepo
     */
    private $newsRepo;
    /**
     * @var NewsCategoryRepo
     */
    private $newsCategoryRepo;

    /**
     * HomeController constructor.
     * @param AdvertisementRepo $advertisementRepo
     * @param NewsRepo $newsRepo
     * @param NewsCategoryRepo $newsCategoryRepo
     */
    public function __construct(

        AdvertisementRepo $advertisementRepo,
        NewsRepo $newsRepo,
        NewsCategoryRepo $newsCategoryRepo
    )
    {
        $this->advertisementRepo = $advertisementRepo;
        $this->newsRepo = $newsRepo;
        $this->newsCategoryRepo = $newsCategoryRepo;
    }

    public function index()
    {
        $ads = $this->advertisementRepo->getAdsForHomePage();
        $newsCats = $this->newsCategoryRepo->getAll();
        $checkAds = Advertisement::where('ending_date', date('Y-m-d'))->get();
        if ($checkAds) {
            foreach ($checkAds as $ad) {
                $ad->status = 0;
                $ad->save();
            }
        }
        return view('frontend.home', compact('ads', 'newsCats'));
    }

    public function addAdsViews($id)
    {
        try {
            $findAd = Advertisement::whereId($id)->first();
            if ($findAd->url != null) {
                $findAd->no_of_views = $findAd->no_of_views + 1;
                $findAd->save();
                return redirect($findAd->url);
            } else {
                return back();
            }
        } catch (\Exception $exception) {
            return back()->with('failed', 'Something Went Wrong');
        }
    }
}

<?php

namespace Modules\News\Http\Controllers;

use App\Models\User;
use App\Repo\NewsCategoryRepo;
use App\Repo\NewsRepo;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\News\Entities\News;
use Modules\News\Entities\NewsCategory;
use Modules\News\Entities\NewsSubCategory;
use Modules\News\Http\Requests\NewsRequest;
use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{
    /**
     * @var NewsRepo
     */
    private $newsRepo;
    /**
     * @var News
     */
    private $news;
    /**
     * @var NewsCategoryRepo
     */
    private $newsCategoryRepo;

    /**
     * NewsController constructor.
     * @param NewsRepo $newsRepo
     * @param News $news
     * @param NewsCategoryRepo $newsCategoryRepo
     */
    public function __construct(NewsRepo $newsRepo, News $news, NewsCategoryRepo $newsCategoryRepo)
    {
        $this->newsRepo = $newsRepo;
        $this->news = $news;
        $this->newsCategoryRepo = $newsCategoryRepo;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = News::orderByDesc('created_at')->with('category');
            if ($request->currentValue == 'mine') {
                $data = $data->where('user_id', auth()->id());
            } elseif ($request->currentValue == 'published') {
                $data = $data->where('status', 1);
            } elseif ($request->currentValue == 'unpublished') {
                $data = $data->where('status', 0);
            } elseif ($request->currentValue == 'trash') {
                $data = $data->onlyTrashed();
            } elseif ($request->currentValue == 'allData') {
                $data = $data->orderByDesc('created_at')->with('category');
            }
            return Datatables::of($data)
                ->addColumn('action', function ($row) use ($request) {
                    if ($request->currentValue == 'trash') {
                        $btn = ' <div><a href="' . route('restore.delete', $row->id) . '" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i class="fa fa-eye" style="color:gray"></i>Restore </a>';
                        $btn .= '<button title="Delete" data-token="' . csrf_token() . '" data-remote="' . route('permanent.delete', $row->id) . '" class="btn btn-sm btn-primary btn-delete bt-delete hover:bg-gray-200 rounded-md dark:hover:bg-dark-2 p-2 force-delete"><i class="fa fa-trash" style="color:tomato"></i>
                                   Delete  </button></div>';
                        return $btn;
                    } else {
                        $btn = '<div class="flex"> <a href="' . route('news.edit', $row->id) . '" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i  class="fa fa-edit" style="color:blue"></i> </a>';
                        $btn .= ' <a href="' . route('news.show', $row->id) . '" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i class="fa fa-eye" style="color:gray"></i> </a>';
                        $btn .= '<button title="Delete" data-token="' . csrf_token() . '" data-remote="' . route('news.destroy', $row->id) . '" class="btn btn-sm btn-primary btn-delete bt-delete hover:bg-gray-200 rounded-md dark:hover:bg-dark-2 p-2 news-delete "><i class="fa fa-trash" style="color:tomato"></i>
                                    </button></div>';
                        return $btn;
                    }
                })
                ->editColumn('image', function ($row) {
                    return '<img src="' . $row->full_feature_image . '" height="50px" width="50px">';
                })
                ->editColumn('created_at', function ($row) {
                    if ($row->created_at) {
                        return $row->getNepaliCreatedAt();
                    }
                })
                ->editColumn('posted_by', function ($row) {
                    return $row->posted_by;
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == '1') {
                        return '<input class="input input--switch border news-status" type="checkbox" onclick="active(this)" value="' . $row->id . '" checked>';
                    } else {
                        return '<input class="input input--switch border news-status" type="checkbox"  onclick="deactive(this)" value="' . $row->id . '">';
                    }
                })
                ->editColumn('share', function ($row) {
                    return $row->share;
                })
                ->editColumn('title', function ($row) {
                    return $row->title;
                })
                ->editColumn('category', function ($row) {
                    foreach ($row->categories as $item) {
                        return getCategoryName($item->category_id);
                    }
                })
                ->addColumn('check', function ($row) {
                    return '<input type="checkbox" name="check[]" class="checkValue" value="' . $row->id . '" multiple/>';
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('search_input_date')) {
                        $instance->where(function ($w) use ($request) {
                            $search = $request->get('search_input_date');
                            $month = Carbon::createFromFormat('M Y', $search)->format('m');
                            $year = Carbon::createFromFormat('M Y', $search)->format('Y');
                            $w->whereMonth('created_at', '=', "$month")
                                ->whereYear('created_at', '=', "$year");
                        });
                    }
                    if (!empty($request->get('category_search')) &&
                        $request->get('category_search') != '--All Category--') {
                        $search = $request->get('category_search');
                        $instance->whereHas('categories', function ($q) use ($search) {
                            $q->where('category_id', '=', $search);
                        });
                    }
                    if (!empty($request->get('search'))) {
                        $search = $request->get('search');
                        $instance->where(function ($q) use ($search) {
                            $q->orWhere('title', 'LIKE', "%$search%")
                                ->orWhere('highlight_text', 'LIKE', "%$search%")
                                ->orWhere('posted_by', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['action', 'image', 'created_at', 'status', 'check'])
                ->make(true);
        }
        $inactive = News::withTrashed()->where('status', 0)->count();
        $countNews = News::count();
        $userNews = News::where('user_id', Auth::id())->count();
        $active = News::where('status', 1)->count();
        $delete = News::onlyTrashed()->count();
        return view('news::news.index', compact('delete', 'inactive', 'countNews', 'userNews', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $cats = $this->newsCategoryRepo->getAll();
        $users = User::pluck('display_name');
        return view('news::news.create', compact('cats', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(NewsRequest $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $data['user_id'] = Auth::id();
            if ($request->flash_news) {
                $data['flash_news'] = 1;
            }
            if ($request->feature_image) {
                $fileName = explode('storage/', $request->feature_image);
                $data['feature_image'] = $fileName[1];
            }
            if ($request->author_image) {
                $fileName = explode('storage/', $request->author_image);
                $data['author_image'] = $fileName[1];
            }
            $data['slug'] = uniqid();
            $news = $this->news->create($data);
            $news->slug = implode([date('Y/m/d' . '/' . $news->id)]);
            $news->save();
            $this->newsRepo->storePivotAttributes($request, $news->id);
            DB::commit();
            session()->flash('success', 'News Successfully Created!');
            return back();
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage() . $exception->getTraceAsString());
            session()->flash('error', 'News could not be Create!');
            return back();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function show(int $id)
    {
        try {
            $news = $this->newsRepo->findById($id);
            if ($news) {
                return view('news::news.show', compact('news'));
            } else {
                session()->flash('error', 'News could not be Found!');
                return back();
            }
        } catch (Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION:' . $exception);
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($id)
    {
        try {
            $news = $this->newsRepo->findById($id);
            if ($news) {
                $cats = $this->newsCategoryRepo->getAll();
                return view('news::news.edit', compact('news', 'cats'));
            } else {
                session()->flash('error', 'News could not be update!');
                return back();
            }
        } catch (Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION:' . $exception);
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Application|Renderable|RedirectResponse|Redirector
     */
    public function update(Request $request, $id)
    {
        $id = (int)$id;
        try {
            DB::beginTransaction();
            $data = $request->all();
            $news = $this->newsRepo->findById($id);
            if ($news) {
                if ($request->feature_image) {
                    $fileName = explode('storage/', $request->feature_image);
                    if (count($fileName) == 1) {
                        $data['feature_image'] = $fileName[0];
                    } else {
                        $data['feature_image'] = $fileName[1];
                    }
                }
                if ($request->author_image) {
                    $fileName = explode('storage/', $request->author_image);
                    if (count($fileName) == 1) {
                        $data['author_image'] = $fileName[0];
                    } else {
                        $data['author_image'] = $fileName[1];
                    }
                }
                if ($request->flash_news == 'on') {
                    $data['flash_news'] = 1;
                } else {
                    $data['flash_news'] = 0;
                }
                $news->fill($data)->save();
                NewsCategory::where('news_id', $id)->delete();
                $this->newsRepo->storePivotAttributes($request, $news->id);
                DB::commit();
                session()->flash('success', 'News Successfully updated!');
                return redirect(route('news.index'));
            }
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'News Cannot Be Updated');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        try {
            $news = $this->newsRepo->findById($id);
            DB::beginTransaction();
            $deletenews = NewsCategory::where('news_id', $news->id)->get();
            foreach ($deletenews as $newsCategory) {
                $newsCategory->delete();
            }
            $news->delete();
            DB::commit();
            session()->flash('success', 'News successfully deleted!');
            return back();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage() . $e->getTraceAsString());
            session()->flash('error', 'News could not be delete!');
            return back();
        }
    }

    public function getNewsSubCategory($id)
    {
        $subCategories = NewsSubCategory::where('category_id', $id)->get();
        return response($subCategories);
    }

    public function changeStatus($id)
    {
        $value = $this->news->findOrFail($id);
        $this->news
            ->whereId($id)
            ->update(['status' => ($value->status == '1') ? '0' : '1']);

    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\News\Entities\News;

class NewsController extends Controller
{
    public function multipleDelete(Request $request)
    {
        if ($request->ajax()) {
            try {
                DB::beginTransaction();
                $newsId = $request->newsId;
                News::whereIn('id', $newsId)->delete();
                DB::commit();
                return redirect()->route('news.index');
            } catch (\Exception $exception) {
                DB::rollBack();
                return response()->json(['failed' => "Bulk News Cannot Be Deleted."]);
            }
        }
    }

    public function restoreNews($id)
    {
        try {
            DB::beginTransaction();
            $findNews = News::onlyTrashed()->findOrFail($id);
            $findNews->restore();
            DB::commit();
            return redirect()->route('news.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->route('news.index');
        }
    }

    public function destroyNews(Request $request, $id)
    {
        if ($request->ajax()) {
            try {
                DB::beginTransaction();
                $findNews = News::onlyTrashed()->findOrFail($id);
                $findNews->forceDelete();
                DB::commit();
                return redirect()->route('news.index');
            } catch (\Exception $exception) {
                DB::rollBack();
                return response()->route('news.index');
            }
        }
    }
}

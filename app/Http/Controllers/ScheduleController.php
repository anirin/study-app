<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Record;

class ScheduleController extends Controller
{
    // DBから時間の取得
    public function scheduleGet(Request $request)
    {
        // カレンダー表示期間
        $start_date = date('Y-m-d', $request->input('start_date') / 1000);
        $end_date = date('Y-m-d', $request->input('end_date') / 1000);

        // 登録処理
        return Schedule::query()
            ->select(
                'start_date as start',
                'end_date as end',
                'event_name as title'
            )
            ->where('end_date', '>', $start_date)
            ->where('start_date', '<', $end_date)
            ->where('user_id', \Auth::user()->id)
            ->get();
    }
}

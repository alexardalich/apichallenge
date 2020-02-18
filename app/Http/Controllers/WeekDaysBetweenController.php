<?php

namespace App\Http\Controllers;

use App\DateTimeComparer;
use App\Http\Requests\DateTimeCompareRequest;
use Illuminate\Http\Resources\Json\Resource;

class WeekDaysBetweenController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param DateTimeCompareRequest $request
     * @return Resource
     */
    public function __invoke(DateTimeCompareRequest $request)
    {
        return new Resource([
            app()->makeWith(DateTimeComparer::class, [
                'startDateTime' => $request->startDateTime,
                'endDateTime' => $request->endDateTime,
                'startDateTimeZone' => $request->startDateTimeZone,
                'endDateTimeZone' => $request->endDateTimeZone,
                'resultFormat' => $request->resultFormat,
            ])->weekDaysBetween()
        ]);
    }
}

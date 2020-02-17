<?php

namespace App\Http\Controllers;

use App\DateTimeComparer;
use App\Http\Requests\DateTimeCompareRequest;
use Illuminate\Http\Resources\Json\Resource;

class DaysBetweenController extends Controller
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
            (new DateTimeComparer(
                $request->startDateTime,
                $request->endDateTime,
                $request->startDateTimeZone,
                $request->endDateTimeZone,
                $request->resultFormat
            ))->daysBetween()
        ]);
    }
}

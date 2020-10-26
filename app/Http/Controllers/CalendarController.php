<?php

namespace App\Http\Controllers;

use App\Facades\Calendar;
use App\Services\CalendarService;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    private $service;

    public function __construct(CalendarService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('index', [
            // 'weeks'         => $this->service->getWeeks(),
            'weeks'         => Calendar::getWeeks(),
            'month'         => Calendar::getMonth(),
            'prev'          => Calendar::getPrev(),
            'next'          => Calendar::getNext(),
        ]);
    }
}

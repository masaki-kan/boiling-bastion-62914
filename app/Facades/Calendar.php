<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Services\CalendarService;

class Calendar extends Facade
{
    protected static function getFacadeAccessor()
    {
      //自作ファサードクラスを格納するためのディレクトリをapp/Facadesとして作成
      //Calendarカレンダー　ファサードに登録する
        return CalendarService::class;
    }
}

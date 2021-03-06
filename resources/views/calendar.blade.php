@extends('layouts.header')
@section('content')
<div class="flex-center position-ref full-height">
            <div class="content">

                <div>
                    <a href="?ym={{ $prev }}">&lt;</a>
                    <h2 class="month">{{ $month }}</h2>
                    <a href="?ym={{ $next }}">&gt;</a>
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th>日</th>
                        <th>月</th>
                        <th>火</th>
                        <th>水</th>
                        <th>木</th>
                        <th>金</th>
                        <th>土</th>
                    </tr>
                    @foreach ($weeks as $week)
                        {!! $week !!}
                    @endforeach
                </table>

            </div>
            {{-- .content --}}
        </div>
        {{-- .flex-center .position-ref .full-height --}}

@endsection

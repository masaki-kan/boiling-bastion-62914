<div class="flex-center position-ref full-height" style="text-align: center;padding: 10px 0;">
            <div class="content">

                <div class="button_area">
                  <a href="?ym={{ $prev }}" style="margin: 0 1%;"><i class="fas fa-arrow-circle-left"></i></a>
                  <button><a href="{{ route('search' , $month) }}">{{ $month }}</a></button>
                  <a href="?ym={{ $next }}" style="margin: 0 1%;"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
                <!--<table class="table table-bordered">
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
                </table>-->

            </div>
            {{-- .content --}}

        </div>
        {{-- .flex-center .position-ref .full-height --}}

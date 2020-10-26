<ul>
  @foreach( Auth::user()->names as $names )
  @if( isset( $names->grandfather ) )
<li><label for="fm_1">{{ $names->grandfather }}</label>
<input type="checkbox" name="grandfather" value="{{ $names->grandfather }}" id="fm_1"></li>
@endif
@if( isset( $names->grandmother ) )
<li><label for="fm_2">{{ $names->grandmother }}</label>
<input type="checkbox" name="grandmother" value="{{ $names->grandmother }}" id="fm_2"></li>
@endif
@if( isset( $names->father ) )
<li><label for="fm_3">{{ $names->father }}</label>
<input type="checkbox" name="father" value="{{ $names->father }}" id="fm_3"></li>
@endif
@if( isset( $names->mother ) )
<li><label for="fm_4">{{ $names->mother }}</label>
<input type="checkbox" name="mother" value="{{ $names->mother }}" id="fm_4"></li>
@endif
@if( isset( $names->son_first_man ) )
<li><label for="fm_5">{{ $names->son_first_man }}</label>
<input type="checkbox" name="son_first_man" value="{{ $names->son_first_man }}" id="fm_5"></li>
@endif
@if( isset( $names->son_first_woman ) )
<li><label for="fm_6">{{ $names->son_first_woman }}</label>
<input type="checkbox" name="son_first_woman" value="{{ $names->son_first_woman }}" id="fm_6"></li>
@endif
@if( isset( $names->son_second_man ) )
<li><label for="fm_7">{{ $names->son_second_man }}</label>
<input type="checkbox" name="son_second_man" value="{{ $names->son_second_man }}" id="fm_7"></li>
@endif
@if( isset( $names->son_second_woman ) )
<li><label for="fm_8">{{ $names->son_second_woman }}</label>
<input type="checkbox" name="son_second_woman" value="{{ $names->son_second_woman }}" id="fm_8"></li>
@endif
@if( isset( $names->son_third_man ) )
<li><label for="fm_9">{{ $names->son_third_man }}</label>
<input type="checkbox" name="son_third_man" value="{{ $names->son_third_man }}" id="fm_9"></li>
@endif
@if( isset( $names->son_third_woman ) )
<li><label for="fm_10">{{ $names->son_third_woman }}</label>
<input type="checkbox" name="son_third_woman" value="{{ $names->son_third_woman }}" id="fm_10"></li>
@endif

@endforeach
</ul>

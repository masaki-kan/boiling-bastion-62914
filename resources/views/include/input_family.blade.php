@foreach( Auth::user()->names as $names )
<div class="list">
<ul>
@if( isset( $images->grandfather ) )
<li>
  @if( $names->grandfather_img )
<img class="img-thumbnail" src="{{ $names->grandfather_img_path }}">
@else
<img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
@endif
  {{ $images->grandfather }}</li>
@endif
@if( isset( $images->grandmother ) )
<li>
  @if( $names->grandmother_img )
<img class="img-thumbnail" src="{{ $names->grandmother_img_path }}">
@else
<img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
@endif
  {{ $images->grandmother }}</li>
@endif
@if( isset( $images->father ) )
<li>
  @if( $names->father_img )
<img class="img-thumbnail" src="{{ $names->father_img_path }}">
@else
<img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
@endif
  {{ $images->father }}</li>
@endif
@if( isset( $images->mather ) )
<li>
  @if( $names->mather_img )
<img class="img-thumbnail" src="{{ $names->mather_img_path }}">
@else
<img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
@endif
  {{ $images->mather }}</li>
@endif
@if( isset( $images->son_first_man ) )
<li>
  @if( $names->son_first_man_img )
<img class="img-thumbnail" src="{{ $names->son_first_man_img_path }}">
@else
<img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
@endif
  {{ $images->son_first_man }}</li>
@endif
@if( isset( $images->son_first_woman ) )
<li>
  @if( $names->son_first_woman_img )
<img class="img-thumbnail" src="{{ $names->son_first_woman_img_path }}">
@else
<img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
@endif
  {{ $images->son_first_woman }}</li>
@endif
@if( isset( $images->son_second_man ) )
<li>
  @if( $names->son_second_man_img )
<img class="img-thumbnail" src="{{ $names->son_second_man_img_path }}">
@else
<img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
@endif
{{ $images->son_second_man }}</li>
@endif
@if( isset( $images->son_second_woman ) )
<li>
  @if( $names->son_second_woman_img )
<img class="img-thumbnail" src="{{ $names->son_second_woman_img_path }}">
@else
<img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
@endif
{{ $images->son_second_woman }}</li>
@endif
@if( isset( $images->son_third_man ) )
<li>
  @if( $names->son_third_man_img )
<img class="img-thumbnail" src="{{ $names->son_third_man_img_path }}">
@else
<img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
@endif
  {{ $images->son_third_man }}</li>
@endif
@if( isset( $images->son_third_woman ) )
<li>
  @if( $names->son_third_woman_img )
<img class="img-thumbnail" src="{{ $names->son_third_woman_img_path }}">
@else
<img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
@endif
  {{ $images->son_third_woman }}</li>
@endif
</ul>
</div>
@endforeach

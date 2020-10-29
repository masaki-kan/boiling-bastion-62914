@extends('layouts.header')
@section('content')
<div class="sp_content">
  <span>{{ $images->created_at }}</span>
  <img src="{{ $images->file_path }}" class="img-thumbnail">
</div>
@if( isset( $images->title ) )
<div class="sp_content">
  <span>メモ</span>
  <p>{{ $images->title }}</p>
</div>
<div class="sp_content">
  <span>一緒にいた人</span>
  @include( 'include.input_family' )
@endif


<form action="{{ route('title_up') }}" method="POST">
<div class="sp_content">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $images->id }}">
    <input type="hidden" name="user_id" value="{{ $images->user_id }}">
     @if( !isset( $images->title ) )
     <span>メモ更新</span>
  <div>
    @if( $errors->has('title') )
      <p style="color:#ff0000;margin:0;">{{ $errors->first('title') }}</p>
    </div>
    @endif
  <input type="text" name="title" value="{{ $images->title }}">
  </div>

</div>
<div class="sp_content">
  <span>一緒にいた人更新</span>
<div class="family">
  <p>チェックしてください</p>
    <div class="list">
      @include('include.check_family')
    </div>
<div class="button_area">
<label class="btn btn-primary button" for="submit">更新</label>
<input type="submit" id="submit" value="追加" style="display:none;">
</div>
</div>
@endif
</div>
@if( session('success') )
<p></p>
@endif
</form>
<div class="button_area">
<button style="display:block;"><a onclick="alert('削除しました')" href="{{ route('delete' , $images->id ) }}">削除</a></button>
</div>
@endsection

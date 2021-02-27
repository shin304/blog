@extends('layouts.master')
@section('title', 'ブログ投稿')
@section('content')
  <div class="col-md-9 mx-auto">
    <h2>ブログ登録</h2>
    <form method="POST" action="{{ route('store') }}" onsubmit="return checkSubmit()">
      @csrf
      <div class="form-group">
        <label for="title">タイトル</label>
        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" placeholder="タイトルを入力してください">
      </div>
      <div class="form-group">
        <label for="content">本文</label>
        <textarea class="form-control" id="contetnt" name="content" value="{{old('content')}}" rows="5" placeholder="本文の内容を入力してください"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">登録する</button>
      <a href="{{ route('blogs') }}"><button type="button" class="btn btn-secondary">キャンセル</button></a>
    </form>
  </div>
  <script>
    function checkSubmit(){
    if(window.confirm('送信してよろしいですか？')){
        return true;
    } else {
        return false;
    }
    }
    </script>
@endsection

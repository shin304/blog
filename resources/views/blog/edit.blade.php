@extends('layouts.master')
@section('title', 'ブログ投稿')
@section('content')
  <div class="col-md-9 mx-auto">
    <h2>ブログ編集フォーム</h2>
    <form method="POST" action="{{ route('update') }}" onsubmit="return checkSubmit()">
      @csrf
      <input type="hidden" id="id" name="id" value="{{$blog->id}}">
      <div class="form-group">
        <label for="title">タイトル</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$blog->title}}" placeholder="タイトルを入力してください">
        @if ($errors->has('title'))
          <div class="text-danger">
            {{$errors->first('title')}}
          </div>
        @endif
        <div class="text-danger">
        </div>
      </div>
      <div class="form-group">
        <label for="content">本文</label>
        <textarea class="form-control" id="contetnt" name="content" rows="5" placeholder="本文の内容を入力してください">{{$blog->content}}</textarea>
        @if ($errors->has('content'))
          <div class="text-danger">
            {{$errors->first('content')}}
          </div>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">更新する</button>
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

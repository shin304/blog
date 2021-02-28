@extends('layouts.master')
@section('title', 'ブログ一覧')
@section('content')
    <div class="row">
      <div class="col-md-9 mx-auto">
        <h2>ブログ記事一覧</h2>
        @if (session()->has('err_msg'))
            <div class="alert text-danger alert-danger">{{session('err_msg')}}</div>
        @endif
        @if (session()->has('success_msg'))
            <div class="alert text-sucess alert-success">{{session('success_msg')}}</div>
        @endif
        <table class="table table-striped">
          <tr>
            <th>記事番号</th>
            <th>タイトル</th>
            <th>日付</th>
            <th></th>
            <th></th>
          </tr>
          @foreach ($blogs as $key => $value)
            <tr>
              <td>{{$value->id}}</td>
              <td><a href="/blog/{{$value->id}}">{{$value->title}}</a></td>
              <td>{{$value->updated_at}}</td>
              <td><button type="butoon" class="btn btn-primary" onclick="location.href='/edit{{$value->id}}'">編集</button></td>
              <td><button type="butoon" class="btn btn-danger" onclick="location.href='/delete{{$value->id}}'">削除</button></td>
            </tr>
          @endforeach
        </table>
        {{$blogs->links()}}
      </div>
    </div>
  @endsection

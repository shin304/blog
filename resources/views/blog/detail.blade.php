@extends('layouts.master')
@section('title', 'ブログ詳細')
@section('content')
    <div class="row">
      <div class="col-md-9 mx-auto">
      <h2>ブログ詳細</h2>
      <div class="card">
        <div class="card-header">
          {{$blog->title}}
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <p>{{$blog->content}}</p>
            <footer class="blockquote-footer">作成日：<cite title="Source Title">{{$blog->updated_at}}</cite></footer>
          </blockquote>
        </div>
      </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
  <h1>投稿一覧ページ</h1>

  <a class="btn btn-primary" href="{{ url('/create') }}">投稿ページへ</a>
@endsection
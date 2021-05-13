@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="border p-4">
    <h1 class="mb-4 font-weight-bold">投稿一覧ページ</h1>
    <a class="btn btn-primary" href="{{ url('/book/create') }}">投稿ページへ</a>
  </div>
</div>
@endsection
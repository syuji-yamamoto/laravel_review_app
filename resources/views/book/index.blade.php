@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="border p-4">
    <h1 class="mb-4 font-weight-bold">投稿一覧ページ</h1>
    <a class="btn btn-primary" href="{{ url('/book/create') }}">投稿ページへ</a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ニックネーム</th>
          <th scope="col">タイトル</th>
          <th scope="col">レビュー</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($books as $book)
        <tr>
          <td>{{ $book->user->nickname }}</td>
          <td>{{ $book->title }}</td>
          <td>{{ $book->contents }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
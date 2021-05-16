@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="border p-4">
    <h1 class="font-weight-bold">投稿一覧ページ</h1>
    @if (Auth::check()){
      <a class="btn btn-link" href="#">{{ $user->nickname }}</a>
      <a class="btn btn-primary" href="{{ url('/book/create') }}">投稿ページへ</a>
    @endif
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ニックネーム</th>
          <th scope="col">タイトル</th>
          <th scope="col">レビュー</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
      @foreach ($books as $book)
        <tr>
          <td style="min-width: 10em;">{{ $book->user->nickname }}</td>
          <td style="min-width: 10em;">{{ $book->title }}</td>
          <td>{{ $book->contents }}</td>
          <td><a class="btn btn-primary" href="{{ route('book.show', $book->id) }}">詳細</a></td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
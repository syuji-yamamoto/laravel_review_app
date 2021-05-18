@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="border p-4">
  <h1 class="font-weight-bold">ユーザーマイページ</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ニックネーム</th>
          <th scope="col">Eメールアドレス</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">{{ $user->nickname }}</th>
          <td>{{ $user->email }}</td>
        </tr>
      </tbody>
    </table>
    <h4 class="font-weight-bold">{{ $user->nickname }}さんの投稿一覧</h4>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">タイトル</th>
          <th scope="col">レビュー</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
      @foreach ($books as $book)
        <tr>
          <td style="min-width: 10em;">{{ $book->title }}</td>
          <td>{{ $book->contents }}</td>
      @endforeach
      </tbody>
    </table>

    <a class="btn btn-primary" href="{{ url('/') }}">トップページへ</a>
  </div>
</div>
@endsection
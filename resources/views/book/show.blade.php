@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="border p-4">
    <h1 class="mb-4 font-weight-bold">投稿詳細ページ</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ニックネーム</th>
          <th scope="col">タイトル</th>
          <th scope="col">レビュー</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $book->user->nickname }}</td>
          <td>{{ $book->title }}</td>
          <td>{{ $book->contents }}</td>
          <td><a class="btn btn-primary" href="#">編集</a></td>
          <td><a class="btn btn-primary" href="#">削除</a></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
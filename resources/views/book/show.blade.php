@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="border p-4">
    <h1 class="font-weight-bold">投稿詳細ページ</h1>
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
          <td style="min-width: 10em;">{{ $book->user->nickname }}</td>
          <td style="min-width: 10em;">{{ $book->title }}</td>
          <td>{{ $book->contents }}</td>
          @if(Auth::user()->id === $book->user_id)
          <td><a class="btn btn-primary" href="{{ route('book.edit', $book->id) }}">編集</a></td>
          <td>
            <form method = "POST" href="{{ route('book.destroy', $book->id) }}" >
            @csrf
            @method('DELETE')
            <input type = "submit" class="btn btn-primary" name = "" value = "削除">
            </form>
          @endif
          </td>
        </tr>
      </tbody>
    </table>
    <p>【イメージ画像】</p>
    <img src="{{ Storage::url($book->image) }}" alt="image" width="150px" height="100px">
  </div>
</div>
@endsection
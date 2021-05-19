@extends('layouts.app')

@include('layouts.header')

@section('content')
<div class="container mt-4">
  <form class="form-inline">
    <div class="form-group">
    <input type="search" class="form-control mr-sm-2" name="search"  value="{{request('search')}}" placeholder="キーワードを入力" aria-label="検索...">
    </div>
    <input type="submit" value="検索" class="btn btn-info">
  </form>
  <div class="border p-4">
    <h1 class="font-weight-bold">投稿一覧ページ</h1>
    @if (Auth::check())
      <a class="btn btn-link" href="{{ url('/show') }}">{{ $user->nickname }}</a>
      <a class="btn btn-primary" href="{{ url('/book/create') }}" style="margin-bottom: 5px;">投稿ページへ</a>
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

<div class="d-flex justify-content-center ">
  {{ $books->links() }}
</div>
@endsection
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
          @if ($book->user->id === auth()->id())
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
    @if ($book->image === "")
      <p>【イメージ画像】</p>
      画像はありません。
    @else
      <p>【イメージ画像】</p>
      <img src="{{ Storage::url($book->image) }}" alt="image" width="150px" height="100px">
    @endif
  </div>
  
  <div class="border p-4" style="margin-top: 10px;">
  @if (Auth::check())
    <div id="user-id" name="{{ $user->nickname }}"></div>
  @endif
    @if (Auth::check())
      <form class="mb-4" method="POST" action="{{ route('comment.store') }}" id = "new_comment">
        @csrf
        <input name="book_id" type="hidden" value="{{ $book->id }}" id = "book-id">
        <fieldset class="mb-4">
          <div class="form-group">
            <label for="comment" style="margin-top: 10px;">コメント入力</label>
            <textarea id="comment" name="comment" class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" rows="4">{{ old('comment') }}</textarea>
              @if ($errors->has('comment'))
                <div class="invalid-feedback">
                  {{ $errors->first('comment') }}
                </div>
              @endif
          </div>
          <div class="mt-4">
            <button type="submit" class="btn btn-primary">
              コメントする
            </button>
          </div>
        </fieldset>
      </form>
    @else
      <p class="text-center">
        **************************************<br>
          ログインするとコメントすることができます。<br>
        **************************************<br>
      </p>
    @endif

    <h5 class="font-weight-bold">コメント一覧</h5>
    @forelse ($book->comment as $comment)
      <div class="border-top">
        <p>
          投稿者：{{ $comment->user->nickname }}<br>
          コメント：{{ $comment->comment }}
        </p>
      </div>
    @empty
    <div class = "comments-list">コメントはまだありません。</div>
    @endforelse
    <!-- ここにajaxで取得したコメントデータを表示 -->
    <div id = "ajax_comment"></div>
  </div>

  <a class="btn btn-primary" href="{{ url('/') }}" style="margin-top: 10px;">投稿一覧ページへ戻る</a>
</div>

@endsection
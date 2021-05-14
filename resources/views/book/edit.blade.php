@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="border p-4">
        <h1 class="mb-4 font-weight-bold">レビューの編集</h1>
 
        <form method="POST" action="{{ route('book.update', $book->id) }}">
            @csrf
            @method('PUT')
            <fieldset class="mb-4">
                <div class="form-group">
                    <label for="title">本のタイトル</label>
                    <input id="name" name="title" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $book->title }}" type="text">
                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="contents">レビュー</label>
                    <textarea id="contents" name="contents" class="form-control {{ $errors->has('contents') ? 'is-invalid' : '' }}" rows="4">{{ $book->contents }}</textarea>
                    @if ($errors->has('contents'))
                        <div class="invalid-feedback">
                            {{ $errors->first('contents') }}
                        </div>
                    @endif
                </div>

                <div class="mt-5">
                    <a class="btn btn-secondary" href="/">
                        キャンセル
                    </a>
 
                    <button type="submit" class="btn btn-primary">
                        編集する
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection
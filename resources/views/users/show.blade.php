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
    <a class="btn btn-primary" href="{{ url('/') }}">トップページへ</a>
  </div>
</div>
@endsection
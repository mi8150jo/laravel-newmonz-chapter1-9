@extends('layouts.app')
@section('content')
<main class="container">
    <form action="{{ route('receipt.store') }}" method="post">
        @include('receipt.form')
        <button type="submit">投稿する</button>
        <a href="{{ route('top') }}">キャンセル</a>
    </form>
</main>
@endsection()
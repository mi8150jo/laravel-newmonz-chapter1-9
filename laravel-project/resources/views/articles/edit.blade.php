@extends('layouts.app')

@section('content')
@include('commons.error')
<form action="{{ route('articles.update', $article) }}" method="post">
    <!-- form要素ではmethod属性がpostがgetのみだから -->
    <!-- methodを指定する -->
    @method('patch')
    @include('articles.form')
    <button type="submit">更新する</button>
    <a href="{{ route('articles.show', $article) }}">キャンセル</a>
</form>
@endsection()
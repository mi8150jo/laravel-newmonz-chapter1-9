@extends('layouts.app')
@section('content')
<h1>マイページ</h1>
<p><a href="{{ route('top') }}">{{ config("app.name") }}</a></p>
<p><a href="{{ route('receipt.create') }}">レシートの登録</a></p>
@endsection()
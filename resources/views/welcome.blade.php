@extends('layouts.app')

@section('css')
	<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="welcome-wrapper">
	<h1 class="text-center welcome-title">Moviegram</h1>
	<h2 class="text-center welcome-text">～お気に入りの映画を共有しよう～</h2>
	<a href="{{ route('topic.index') }}" class="btn btn-primary">みんなの投稿</a>
</div>
@endsection

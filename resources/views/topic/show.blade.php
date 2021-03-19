@extends('layouts.app')

@section('css')
	<link href="{{ asset('css/show.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="topic-show-wrapper">
	<h1 class="text-center">レビュー詳細</h1>
	<div class="card">
		<div class="card-body">
			<h3>タイトル：{{ $topic->title }}</h3>
			<p>内容：{{ $topic->content }}</p>
			<p>評価（10点満点）：{{ $topic->grade }}</p>
			<p>感想：{{ $topic->impression }}</p>
		</div>
	</div>
</div>
@endsection
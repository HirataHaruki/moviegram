@extends('layouts.app')

@section('css')
	<link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="topic-index-wrapper">
	<h1 class="text-center">レビュー一覧</h1>
	@foreach($topics as $topic)
		<div class="card">
			<div class="card-body">
				<h3>タイトル：{{ $topic->title }}</h3>
				<p>内容：{{ $topic->content }}</p>
				<p>評価（10点満点）：{{ $topic->grade }}</p>
				@if(Auth::id() === $topic->user_id)
					<a href="{{ route('topic.show', $topic->id) }}" class='btn btn-secondary'>詳細を読む</a>
					<a href="{{ route('topic.edit', $topic->id) }}" class='btn btn-secondary'>編集する</a>
					<a>
						<form method='POST' action="{{ route('topic.destroy', $topic->id) }}">
							@csrf
							@method('DELETE')
							<input type='submit' class='btn btn-secondary' value='削除する'>
						</form>
					</a>
				@else
					<a href="{{ route('topic.show', $topic->id) }}" class='btn btn-secondary'>詳細を読む</a>
				@endif
			</div>
		</div>
	@endforeach
</div>
@endsection
@extends('layouts.app')

@section('css')
	<link href="{{ asset('css/search.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="topic-search-wrapper">
	<h1 class="text-center">レビュー検索</h1>
	<form method='GET' action="{{ route('search') }}">
		<input type='text' name='keyword' value="{{$keyword}}">
		<input type='submit' value="検索">
	</form>
	@if($topics->count())
		@foreach ($topics as $topic)
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
	@else
		<p>検索結果はありませんでした</p>
	@endif
</div>
@endsection
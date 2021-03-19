@extends('layouts.app')

@section('css')
	<link href="{{ asset('css/create.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="topic-create-wrapper">
	<h1 class="text-center">レビュー投稿</h1>
	<form method='POST' action="{{ route('topic.store') }}">
		@csrf
		<div class="card">
			<div class="card-body">
				<div class="form-group">
					<label>映画のタイトル</label>
					<input type='text' class='form-control' name='title' placeholder='タイトルを入力'>
				</div>
				<div class="form-group">
					<label>映画の内容</label>
					<input type='text' class='form-control' name='content' placeholder='内容を入力'>
				</div>
				<div class="form-group">
					<label>評価（10点満点）</label>
					<input type='number' class='form-control' name='grade' placeholder='評価を入力'>
				</div>
				<div class="form-group">
					<label>感想</label>
					<input type='text' class='form-control' name='impression' placeholder='感想を入力'>
				</div>
				<input type='submit' class='btn btn-primary' value='レビューを登録'>
			</div>
		</div>
	</form>
</div>
@endsection
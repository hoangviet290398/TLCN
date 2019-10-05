@extends('layout.master')
@section('title','Search result')
@section('content')

<main>
	<div class="container mt-5">
		<div class="card shadow">
			<div class="card-header text-center">
				<h3>Search result for "{{$keyword}}"</h3>
			</div>
			<div class="card-body p-0">
				@foreach($questions as $question)
				<div class="row px-3 pt-3">
					<div class="col-sm-1"><img src="{{ asset('storage/avatars')}}/{{$question->user->avatar}}" class="user-avatar rounded-circle align-middle"></div>
					<div class="col-sm-11">
							<a href="/personalinfomation/{{ $question->user->_id }}">
								<small class="font-weight-bold" style="color:#5488c7;">{{$question->user->fullname}}</small>
							</a>
						<small class="text-muted" style="color:#5488c7;">
							{{$question->created_at->diffForHumans()}}
						</small>
						<br>

						<div class="float-left"><a href="topic/{{ $question->id }}"><h5>{{$question->title}}</h5></a></div>
						<small class="float-right border rounded-pill text-primary bg-light p-2 font-weight-bold">{{$question->category->name}}</small>

						<br>
						<br>
						<p class="pv-archiveText">{{$question->content}}</p>
						@include('layout.like_dislike')
					</div>

				</div>
				<hr>
				@endforeach
			</div>
		</div>
	</div>
</main>
@endsection

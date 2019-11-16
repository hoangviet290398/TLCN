
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
				@foreach($result as $key => $value)
				{{-- @php

				$carbon = new Carbon($value->_source->created_at);
				@endphp --}}
				<div class="row px-3 pt-3">
					<div class="col-sm-1"><img src="{{ asset('storage/avatars')}}/" class="user-avatar rounded-circle align-middle"></div>
					<div class="col-sm-11">
						<a href="/personalinfomation/{{$value->_source->user_id}}">
							<small class="font-weight-bold" style="color:#5488c7;">{{$value->_source->user_id}}</small>
						</a>
						<small class="text-muted" style="color:#5488c7;">
							
							{{$value->_source->created_at}}
						</small>
						<br>

						<div class="float-left"><a href="topic/{{ $value->_id}} "><h5>{{$value->_source->title}}</h5></a></div>
						<small class="float-right border rounded-pill text-primary bg-light p-2 font-weight-bold">{{$value->_source->category_id}}</small>

						<br>
						<br>
						<p class="pv-archiveText">{{$value->_source->content}}</p>
						<div class="row bg-light py-3" style="width: 97%; color:gray;">
							<div class="border rounded text-muted bg-white col-sm-2 text-center ml-3">
								<i class="fa fa-thumbs-up"></i>
								{{$value->_source->total_like}} likes
							</div>
							<div class="p-2"></div>
							<div class="border rounded text-muted bg-white col-sm-3 text-center">
								<i class="fa fa-thumbs-down"></i>
								{{$value->_source->total_dislike}} dislikes
							</div>
							<div class="p-2"></div>
							<div class="border rounded text-muted bg-white col-sm-3 text-center">
								<i class="fa fa-comment"></i>
								{{$value->_source->total_answer}} answers


							</div>

							<div class="col-2"></div>
							<div class="p-2"></div>
							<div class="p-1"></div>

							<div class="col-3 ml-1">
								<a href="#" class="border rounded text-light bg-dark col-sm-2 text-center">Answer</a>
							</div>

						</div>
					</div>

				</div>
				<hr>
				@endforeach
			</div>
		</div>
	</div>
	{{-- @foreach($result as $key => $value)  
	<h5>{{$value->_source->title}}</h5>
	@endforeach  --}}
</main>
@endsection

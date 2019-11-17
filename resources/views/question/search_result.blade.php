@extends('layout.master')
@section('title','TechSolution')
@section('content')

<main>

	<img src="{{ asset('images/resource/slogan.png') }}" style="height:15%" alt="placeholder+image">



	<div class="mt-1 d-flex justify-content-center">
		@include('layout.leftpanel')
		<div class="card col-7">
			<div class="card-header text-center" style="background-color: white">
				<ul class="nav nav-pills">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="pill" href="#home">Recent Question</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="pill" href="#menu1">Hot</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="pill" href="#menu1">Week</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="pill" href="#menu2">Month</a>
					</li>
				</ul>
			</div>
			<div class="card-body p-0">
				@foreach($result as $key => $value)
				<div class="row px-3 pt-3">
					<div class="col-sm-1"><img src="{{ asset('storage/avatars')}}/"
						class="img-fluid rounded-circle align-middle user-avatar"></div>
						<div class="col-sm-11">
							<a href="/personalinfomation/{{ $value->_source->user_id }}">
								<small class="font-weight-bold" style="color:#5488c7;">{{$value->_source->user_id}}</small>
							</a>
							<small class="text-muted pl-4" style="color:#5488c7;">asked:
								{{$value->_source->created_at}}
							</small>
							<br>
							<div class="row">
								<div class="col-12">
									<div class="word-wrap">
										<a href="topic/{{ $value->_id }}">
											<h5>{{$value->_source->title}}</h5>
										</a></div>


									</div>
                            <!-- <div class="col-2">
                                <small
                                    class="float-right border rounded-pill text-primary bg-light p-2 font-weight-bold">{{$value->_source->category_id}}</small>
                                </div> -->
                            </div>

                            <p class="pv-archiveText">{{$value->_source->content}}</p>
                            <!-- QuyTran added -->
                            <div class="row">
                            	<div class="pl-3 pt-1 pb-3">
                            		<a href="#" class="border text-muted p-1 rounded ">
                            			{{$value->_source->category_id}}
                            		</a>

                            	</div>
                            </div>
                            <!-- QuyTran end add -->
                            <div class="ml-3">
                            	<div class="row col-sm-12 bg-light py-3" style="">
                            		<div class="col-sm-3 px-1">
                            			<div class="border rounded text-muted bg-white text-center px-1">
                            				<i class="fa fa-thumbs-up"></i>
                            				{{$value->_source->total_like}} likes
                            			</div>
                            		</div>
                            		<div class="col-sm-3 px-1">
                            			<div class="border rounded text-muted bg-white text-center">
                            				<i class="fa fa-thumbs-down"></i>
                            				{{$value->_source->total_dislike}} dislikes
                            			</div>
                            		</div>

                            		<div class="col-sm-3 px-1">
                            			<div class="border rounded text-muted bg-white text-center">
                            				<i class="fa fa-comment"></i>
                            				{{$value->_source->total_answer}} answers
                            			</div>
                            		</div>


                            		<div class="col-sm-3">
                            			<a href="#" class="border rounded text-light bg-dark text-center px-4" style="font-size:18px">Answer</a>

                            		</div>

                            	</div>
                            </div>

                        </div>

                    </div>
                    <hr>
                    @endforeach
                   {{--  <div class="row px-3 pt-3 justify-content-sm-center">{!! $result->links() !!}</div> --}}
                </div>
            </div>
            @include('layout.rightpanel')

        </main>
        @endsection
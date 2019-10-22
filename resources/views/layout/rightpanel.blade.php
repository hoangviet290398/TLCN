<div class="card ml-2 col-3">

			<div class="card-header text-center" style="background-color: white">
				@if(Auth::check())
				<div class="col-0.5">
					<!-- start add button block -->
					<a href="{{route('addTopic')}}" class="btn btn-primary btn-block font-weight-bold">Ask a Question</a>
					<!-- end add button block -->
				</div>
				@endif
			</div>

			{{-- <div class="col-12" style="background-color: #000000">
				<div class="col-1"></div>
				<div class="col-10" style="background-color: white">
					<div class="col">col</div>
					<div class="col">col</div>
					<div class="w-100"></div>
					<div class="col">col</div>
					<div class="col">col</div>
				</div>
				<div class="col-1"></div>

			</div> --}}
			<div class="container">
				<div class="row text-center" style="font-size: 11px">
					<div class="col-2"></div>
					<div class="col-4">Questions</div>
					<div class="col-4">Answers</div>
					<div class="col-2"></div>
				</div>
				<div class="row text-center" style="font-size: 11px">
					<div class="col-2"></div>
					<div class="col-4">Best Answer</div>
					<div class="col-4">Users</div>
					<div class="col-2"></div>
				</div>
			</div>


			<!--QuyTran added 22/10/2019 -->
            <div>
                <h6 class="font-weight-bold ml-3 mt-4"><i class="fa fa-users mr-3"></i>Top Members</h6>
                <br />
                <div class="row px-2 pt-1 pb-1">
                    <br />
                    <div class="col-sm-3">

                        <img src="{{ asset('images/resource/viet.png') }}"
                            class="img-fluid rounded-circle align-middle user-avatar">
                    </div>
                    <br />

                    <div class="col-sm-9">
                        <div class="row">
                            <a class="" href="#">
                                <small class="font-weight-bold" style="color:#5488c7;">Hoang Viet</small>
                            </a>
                        </div>

                        <div class="row">
                            <small class="text-muted pr-2" style="color:#5488c7;">
                                69 Questions
                            </small>

                            <small class="text-muted pr-1" style="color:#5488c7;">
                                9999 Reputation
                            </small>
                        </div>
                    </div>

                </div>
                <hr>
                <div class="row px-2 pt-1 pb-1">
                    <br />
                    <div class="col-sm-3">

                        <img src="{{ asset('images/resource/viet.png') }}"
                            class="img-fluid rounded-circle align-middle user-avatar">
                    </div>
                    <br />

                    <div class="col-sm-9">
                        <div class="row">
                            <a class="" href="#">
                                <small class="font-weight-bold" style="color:#5488c7;">Hoang Viet</small>
                            </a>
                        </div>

                        <div class="row">
                            <small class="text-muted pr-2" style="color:#5488c7;">
                                69 Questions
                            </small>

                            <small class="text-muted pr-1" style="color:#5488c7;">
                                9999 Reputation
                            </small>
                        </div>
                    </div>

                </div>
            </div>

            <div>
                <h6 class="font-weight-bold ml-3 mt-4"><i class="fa fa-tags mr-3"></i>Trending Tags</h6>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="pl-2 py-2">
                            <a href="#" class="border text-primary p-1 bg-light rounded ">
                                C#
                            </a>
                            <small class="px-2">x </small>
                            <small>69</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="pl-2 py-2">
                            <a href="#" class="border text-primary p-1 bg-light rounded ">
                                asp.net
                            </a>
                            <small class="px-2">x </small>
                            <small>12369</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="pl-2 py-2">
                            <a href="#" class="border text-primary p-1 bg-light rounded ">
                                Python
                            </a>
                            <small class="px-2">x </small>
                            <small>15246349</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="pl-2 py-2">
                            <a href="#" class="border text-primary p-1 bg-light rounded ">
                                Python
                            </a>
                            <small class="px-2">x </small>
                            <small>15246349</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="pl-2 py-2">
                            <a href="#" class="border text-primary p-1 bg-light rounded ">
                                Python
                            </a>
                            <small class="px-2">x </small>
                            <small>15246349</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="pl-2 py-2">
                            <a href="#" class="border text-primary p-1 bg-light rounded ">
                                Python
                            </a>
                            <small class="px-2">x </small>
                            <small>15246349</small>
                        </div>
                    </div>
                </div>
            </div>
			<!--QuyTran end add-->
		</div>
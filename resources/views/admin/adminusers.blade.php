<div class="col-sm-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-user"></i> Users</h6>
        </div>
        <div class="card-body">
            <div class="">
                <div id="allUsers">
                    <div class="row">
                        @foreach($users as $user)
                        <div class="col-sm-3 text-center py-2">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-sm-4 pr-2">
                                            <a href="#">
                                                <img src="{{ asset('storage/avatars')}}/{{$user->avatar}}"
                                                    class="img-fluid rounded-circle align-middle user-avatar">
                                            </a>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="h5 font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="#">
                                                    {{$user->fullname}}
                                                </a>
                                            </div>
                                            <div class="mb-0 text-muted">{{$user->questions->count()}} Questions</div>
                                            <div class="mb-0  text-muted">{{$user->answers->count()}} Answers</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <hr>
            Showing all users in <code>Q&A System</code>
        </div>
    </div>
</div>
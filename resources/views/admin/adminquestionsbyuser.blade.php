 <div class="card-header text-center" style="background-color: white">
                <ul class="nav nav-pills font-weight-bold" >
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('manageQuestionsByUser', ['id' => $created_by->id]) }}">Questions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Answer</a>
                    </li>
                   
                </ul>
                <br/>
                <h5 class="text-left">{{number_format($questions->count())}} questions</h5>
            </div>

<div class="py-2"></div>
<div class="row">

   
    <div class="col-sm-12">

        <div class="card text-center">
            <div class="card-header">
                <div class="row">
                               <div class="col-sm-1 pr-2">
                                            @if(is_file('storage/avatars/'.$created_by->avatar))
                                            <a href="#">
                                                <img src="{{ asset('storage/avatars')}}/{{$created_by->avatar}}"
                                                    class="img-fluid rounded-circle align-middle user-avatar">
                                            </a>
                                            @else
                                            <a href="">
                                                <img src="{{$created_by->avatar}}"
                                                    class="img-fluid rounded-circle align-middle user-avatar">
                                            </a>
                                            @endif

                                        </div>
                <div class="col-sm-11">
               <h3 class="text-center mt-3" style=" color:#777;letter-spacing: 10px; "><b>QUESIONS MANAGEMENT</b></h3>
                <h5>Created by <b>{{$created_by->fullname}}</b></h5>
                </div>
                </div>
            </div>
            <div class="card-body">
               
                <div class="row">
                    <div class="col-sm-2">
                        <h5>Title</h5>
                    </div>
                    <div class="col-sm-4">
                        <h5>Content</h5>
                    </div>
                   
                    <div class="col-sm-1">
                        <h5>Tag</h5>
                    </div>
                    <div class="col-sm-1">
                        <h5>Total like</h5>
                    </div>
                    <div class="col-sm-1">
                        <h5>Total dislike</h5>
                    </div>
                    <div class="col-sm-1">
                        <h5>Total answer</h5>
                    </div>
                     <div class="col-sm-2">
                        <h5>Action</h5>
                    </div>
                   

                </div>
                <hr style="height:1px;border:none;color:#333;background-color:#333;">

                <div class="card py-4">
                    @foreach($questions as $question)
                    <div class="row text-muted ">

                        <div class="col-sm-2">
                            <p>{{$question->title}}</p>
                        </div>
                        <div class="col-sm-4">
                            <p>{{$question->content}}</p>
                        </div>
                      
                        <div class="col-sm-1">
                            <p class="badge badge-info" >{{$question->category->name}}</p>
                        </div>
                        <div class="col-sm-1">
                            <p>{{$question->total_like}}</p>
                        </div>
                        <div class="col-sm-1">
                            <p>{{$question->total_dislike}}</p>
                        </div>
                         <div class="col-sm-1">
                            <p>{{$question->total_answer}}</p>
                        </div>
                        <div class="col-sm-2">
                         
                                <!-- Edit-->
                              
                            
                                <!-- Delete-->
                                <span class="">

                                        <button type="button" href="#myModal" data-toggle="modal" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                          <div id="myModal" class="modal fade" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this topic?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <form action="{{route('adminDeleteTopic')}}" method="post">
                                                                    @csrf
                                                                    <input type="text" name="_id" value="{{$question->_id}}" hidden>
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                </span>

                           
                        </div>
                    </div>
                    <hr/>
                    @endforeach
                    <div class="row px-3 pt-3 justify-content-sm-center">{!! $questions->links() !!}</
                </div>

            </div>
            <div class="card-footer text-muted">
                 <hr>
            Showing all questions in <code>Q&A System</code>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->

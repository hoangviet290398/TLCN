<?php $__env->startSection('title','View topic'); ?>
<?php
use App\LikeDislike;
?>

<?php $__env->startSection('js'); ?>
<script>
    $('#fileUpload').fileinput({
        allowedFileExtensions: ['zip', 'rar'],
        theme: 'fa',
        uploadAsync: false,
        showUpload: false,
        maxFileSize: 5120,
        removeClass: 'btn btn-warning'
    });

    var simplemde = new SimpleMDE({
        element: document.getElementById("markdown")
    });

    function checkContent() {
        if (simplemde.value() != "") {
            document.getElementById("addanswer").submit();
        }
    }

    $('#large_like').click('#like_button', function () {
            var question_id = $(this).data("value");
            var post_type = "Question";
          
            if (question_id != '') {
                $.ajax({
                    url: "<?php echo e(route('like')); ?>",
                    method: "GET",
                    data: {
                        question_id,
                        post_type
                    },
                    success: function (data) {
                        data = $.parseJSON(data);
                        
                        if(data.status == true){
                                                            
                            $("#large_like").load(location.href + " #large_like"); 
                            $("#large_dislike").load(location.href + " #large_dislike");                                                                                            
                        }
                        else{
                            
                        }
                    }
                })
            }
            else{
               alert('false');
            }
        });

    $('#large_dislike').click('#dislike_button', function () {
            var question_id = $(this).data("value");
            var post_type = "Question";
            console.log(question_id);
          
            if (question_id != '') {
                $.ajax({
                    url: "<?php echo e(route('dislike')); ?>",
                    method: "GET",
                    data: {
                        question_id,
                        post_type
                    },
                    success: function (data) {
                        data = $.parseJSON(data);
                        
                        if(data.status == true){
                                                            
                            $("#large_dislike").load(location.href + " #large_dislike");
                            $("#large_like").load(location.href + " #large_like");                                                                                              
                        }
                        else{
                            
                        }
                    }
                })
            }
            else{
               alert('false');
            }
        });

    $('#large_like_bestanswer').click('#like_bestanswer_button', function () {
            var question_id = $(this).data("value");
            var post_type = "Answer";
            
            if (question_id != '') {
                $.ajax({
                    url: "<?php echo e(route('like')); ?>",
                    method: "GET",
                    data: {
                        question_id,
                        post_type
                    },
                    success: function (data) {
                        data = $.parseJSON(data);
                        
                        if(data.status == true){
                                                            
                            $("#large_like_bestanswer").load(location.href + " #large_like_bestanswer"); 
                            $("#large_dislike_bestanswer").load(location.href + " #large_dislike_bestanswer");                                                                                            
                        }
                        else{
                            
                        }
                    }
                })
            }
            else{
               alert('false');
            }
        });

    $('#large_dislike_bestanswer').click('#dislike_bestanswer_button', function () {
            var question_id = $(this).data("value");
            var post_type = "Answer";
          
            if (question_id != '') {
                $.ajax({
                    url: "<?php echo e(route('dislike')); ?>",
                    method: "GET",
                    data: {
                        question_id,
                        post_type
                    },
                    success: function (data) {
                        data = $.parseJSON(data);
                        
                        if(data.status == true){
                                                            
                            $("#large_dislike_bestanswer").load(location.href + " #large_dislike_bestanswer"); 
                            $("#large_like_bestanswer").load(location.href + " #large_like_bestanswer");                                                                                            
                        }
                        else{
                            
                        }
                    }
                })
            }
            else{
               alert('false');
            }
        });


    $('#large_like_answer').click('#like_answer_button', function () {
            var question_id = $(this).data("value");
            var post_type = "Answer";
            console.log(question_id);
            if (question_id != '') {
                $.ajax({
                    url: "<?php echo e(route('like')); ?>",
                    method: "GET",
                    data: {
                        question_id,
                        post_type
                    },
                    success: function (data) {
                        data = $.parseJSON(data);
                        
                        if(data.status == true){
                                                            
                            $("#large_like_answer").load(location.href + " #large_like_answer"); 
                            $("#large_dislike_answer").load(location.href + " #large_dislike_answer");                                                                                            
                        }
                        else{
                            
                        }
                    }
                })
            }
            else{
               alert('false');
            }
        });

    $('#large_dislike_answer').click('#dislike_answer_button', function () {
            var question_id = $(this).data("value");
            var post_type = "Answer";
            console.log(question_id);
            if (question_id != '') {
                $.ajax({
                    url: "<?php echo e(route('dislike')); ?>",
                    method: "GET",
                    data: {
                        question_id,
                        post_type
                    },
                    success: function (data) {
                        data = $.parseJSON(data);
                        
                        if(data.status == true){
                                                            
                            $("#large_dislike_answer").load(location.href + " #large_dislike_answer"); 
                            $("#large_like_answer").load(location.href + " #large_like_answer");                                                                                            
                        }
                        else{
                            
                        }
                    }
                })
            }
            else{
               alert('false');
            }
        });

    // 




    var containers = document.getElementsByClassName("image-markdown");
    for (index_container = 0; index_container < containers.length; index_container++) {
        var imgs = containers[index_container].getElementsByTagName("IMG");
        for (index_img = 0; index_img < imgs.length; index_img++) {
            imgs[index_img].setAttribute("class", "h-100 w-100");
        }
    }

</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="mt-1 d-flex justify-content-center" >
<?php echo $__env->make('layout.leftpanel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="card col-7">

    <!-- Start Question Block -->
    <div class="">
        <div class="row px-3 pt-3">
            <?php if(is_file('storage/avatars/'.$question->user->avatar)): ?>

            <div class="col-sm-1"><a href="/personalinfomation/<?php echo e($question->user->_id); ?>" class="text-decoration-none"><img src="<?php echo e(asset('storage/avatars')); ?>/<?php echo e($question->user->avatar); ?>"
                    class="user-avatar rounded-circle align-middle"></a></div>
            <?php else: ?>
             <div class="col-sm-1"><a href="/personalinfomation/<?php echo e($question->user->_id); ?>" class="text-decoration-none"><img src="<?php echo e($question->user->avatar); ?>"
                    class="user-avatar rounded-circle align-middle"></a></div>
            <?php endif; ?>
            <!-- Start Username, Date, Edit, Delete Block -->
            <div class="col-sm-11">
                <div class="font-weight-bold">
                    <a href="/personalinfomation/<?php echo e($question->user->_id); ?>" style="color:#787878; font-size: 20px"><?php echo e($question->user->fullname); ?></a>
                    <!-- Button HTML (to Trigger Modal) -->
                    <?php if((Auth::check()) and ($question->user_id==Auth::user()->id)): ?>
                        <a href="#myModal" data-toggle="modal">
                            <i class="float-right fa fa-trash" aria-hidden="true"
                                style="margin-right:10px; font-size: 15px; "></i></a>
                        <!-- Modal HTML -->
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
                                        <form action="<?php echo e(route('deleteTopic')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <input type="text" name="_id" value="<?php echo e($question->id); ?>" hidden>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo e(asset('edittopic')); ?>/<?php echo e($question->id); ?>"><i class="float-right fa fa-pencil-square-o"
                                aria-hidden="true" style="margin-right:10px; font-size:15px"></i></a>
                    <?php endif; ?>

                </div>
                <div>
                    <small class="text-muted" style="color:#5488c7;" data-toggle="tooltip" title="<?php echo e($question->created_at->toDayDateTimeString()); ?>">
                        <i class="fa fa-clock-o" aria-hidden="true"> </i>
                        <?php echo e($question->created_at->diffForHumans()); ?>

                    </small>
                </div>
                <br>
            </div>
            <!-- End Username, Date, Edit, Delete Block -->

            <!-- Start Question Title Block -->
            <div class="col-sm-12">
                <h3 class="text-primary font-weight-bold d-flex justify-content-sm-between">
                    <div style="max-width:950px"><?php echo e($question->title); ?></div>
                    <a href="<?php echo e(route('viewByCategory', ['id' => $question->category->id])); ?>"><span class="badge badge-info d-flex" style="height: 32px"><?php echo e($question->category->name); ?></span></a>
                </h3>
                   <hr style="border-width: 1px; border-style: solid; border-color: #b2bec3;">
            </div>
            <!-- End Question Title Block -->



            <!-- Start Question Content Block -->
            <div class="col-sm-12 px-3" id="big">
                <div class="image-markdown"><?php echo $question->content; ?></div>
                <?php if($question->attachment_path): ?>
                <b class="badge badge-warning">Attachment:</b>
                <a
                    href="<?php echo e(asset('storage/files/'.$question->attachment_path)); ?>"><i><?php echo e($question->attachment_path); ?></i></a>

                <?php endif; ?>
                <div class="row" id="large"
                    style="width: 500px; color:#787878; font-size: 20px; margin-bottom: 10px; margin-left: 5px;">
                    <div class="col-xs" style="width:70px" id="large_like" data-value="<?php echo e($question->id); ?>">
                        <?php if(Auth::check()): ?>
                            <?php if(LikeDislike::where('post_id',$question->id)->where('user_id',Auth::user()->id)->where('action','Like')->count()!= 0): ?>
                           
                                
                               <i class="fa fa-thumbs-up" style="color: blue;" id="like_button"></i>
                                <?php echo e($question->total_like); ?>

                            <?php else: ?>
                                <i class="fa fa-thumbs-up" style="color: #787878;" id="like_button"></i>
                                <?php echo e($question->total_like); ?>

                            <?php endif; ?>

                        <?php else: ?>
                            <i class="fa fa-thumbs-up" style="color:#787878"></i>
                            <?php echo e($question->total_like); ?>

                        <?php endif; ?>
                    </div>
                    <div class="col-xs" style="width:70px" id="large_dislike" data-value="<?php echo e($question->id); ?>">
                        <?php if(Auth::check()): ?>

                            <?php if(LikeDislike::where('post_id',$question->id)->where('user_id',Auth::user()->id)->where('action','Dislike')->count()!= 0): ?>
                             <i class="fa fa-thumbs-down" style="color: red;" id="dislike_button"></i>
                                <?php echo e($question->total_dislike); ?>

                            <?php else: ?>
                                <i class="fa fa-thumbs-down" style="color: #787878;" id="dislike_button"></i>
                                <?php echo e($question->total_dislike); ?>

                            <?php endif; ?>

                        <?php else: ?>
                            <i class="fa fa-thumbs-down" style="color:#787878"></i>
                            <?php echo e($question->total_dislike); ?>

                        <?php endif; ?>
                    </div>
                    <div class="col-xs" style="width:70px">
                        <i class="fa fa-comment"></i> <?php echo e($question->total_answer); ?>

                    </div>
                </div>
            </div>
            <!-- End Question Content Block -->
        </div>
    </div>
    <!-- End Question Block -->


    <!-- Start Insert Answer Block -->
    <?php if(Auth::check()): ?>
    <div class="" style="margin-top: 20px;">
        <div class="card-body">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-danger"><?php echo e($error); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if(Session::has('errorUpload')): ?>
                <div class="alert alert-danger"><?php echo e(Session::get('errorUpload')); ?></div>
            <?php endif; ?>
            <form id="addanswer" method="post" action="<?php echo e(route('addAnswer')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="text" name="question_id" hidden value="<?php echo e($question->_id); ?>">
                <div class="form-group">
                   
                    <div class="row">
                       
                        <div class="col-sm-12">
                            <textarea id="markdown" name="content"></textarea>
                        </div>
                    </div>
                     <div class="row">
                         <div class="col-sm-12">
                            <div class="file-loading">
                                <input id="fileUpload" name="attachment" type="file">
                            </div>
                        </div>
                    </div>
                </div>
                <button onclick="checkContent()" type="button" class="btn btn-primary float-right">Answer</button>
            </form>
        </div>
    </div>
    <?php endif; ?>
    <!-- End Insert Answer Block -->

    <!-- Start Answer Block -->
    <div class="" style="margin-top: 20px; margin-bottom: 20px; " id="answer_block">
        <div class="card-header">
            <h3><i class="fa fa-angle-double-right"></i> Answers:</h3>
        </div>

        <!-- Start Best Answer Block -->
        <?php if($bestAnswer!=null): ?>
        <div class="row px-3 pt-3">
            <div class="col-1">
                <?php if(is_file('storage/avatars/'.$bestAnswer->user->avatar)): ?>
                <a href="/personalinfomation/<?php echo e($bestAnswer->user->_id); ?>" class="text-decoration-none"><img src="<?php echo e(asset('storage/avatars')); ?>/<?php echo e($bestAnswer->user->avatar); ?>" class="user-avatar rounded-circle align-middle"></a>
                <?php else: ?>
                 <a href="/personalinfomation/<?php echo e($bestAnswer->user->_id); ?>" class="text-decoration-none"><img src="<?php echo e($bestAnswer->user->avatar); ?>" class="user-avatar rounded-circle align-middle"></a>
                <?php endif; ?>
                <br>
                <br>
                <div class="d-flex" style="justify-content :center; align-items:center;  font-size:200%; color:#66ad1f">
                    <i class="fa fa-check" aria-hidden="true"></i>
                </div>
            </div>
            <div class="col-sm-11">
                <div class="float-left">
                <a href="/personalinfomation/<?php echo e($bestAnswer->user->_id); ?>" style="color:#787878; font-size: 20px"><?php echo e($bestAnswer->user->fullname); ?></a>
                <br>
                    <small class="text-muted" style="color:#5488c7;" data-toggle="tooltip" title="<?php echo e($bestAnswer->created_at->toDayDateTimeString()); ?>">
                        <i class="fa fa-clock-o" aria-hidden="true"> </i>
                        <?php echo e($bestAnswer->created_at->diffForHumans()); ?>

                    </small>
                </div>

                <?php if(Auth::check() and (Auth::user()->id==$bestAnswer->user_id)): ?>
                    <a href="<?php echo e(asset('editanswer')); ?>/<?php echo e($bestAnswer->id); ?>">
                        <i class="float-right fa fa-pencil-square-o ml-2" aria-hidden="true" style="font-size:15px"></i>
                    </a>
                <?php endif; ?>
                <br>
                <br>
                <br>
                <div class="image-markdown" style="padding-right: 58px;"><?php echo $bestAnswer->content; ?></div>
                <?php if($bestAnswer->attachment_path): ?>
                    <b class="badge badge-warning">Attachments:</b>
                    <a href="<?php echo e(asset('storage/files/'.$bestAnswer->attachment_path)); ?>"><i><?php echo e($bestAnswer->attachment_path); ?></i></a>
                <?php endif; ?>
                <div class="row" style=" color:#787878; font-size: 20px ; margin-bottom: 10px">
                    <div class="col-1"  id="large_like_bestanswer" data-value="<?php echo e($bestAnswer->id); ?>">
                        <?php if(Auth::check()): ?>
                            <?php if(LikeDislike::where('post_id',$bestAnswer->id)->where('user_id',Auth::user()->id)->where('action','Like')->count()!= 0): ?>
                              
                                <i class="fa fa-thumbs-up" style="color: blue;" id="like_bestanswer_button"></i> <?php echo e($bestAnswer->total_like); ?>

                            <?php else: ?>
                                <input type="text" id="bestanswer_id" value="<?php echo e($bestAnswer->id); ?>" hidden>
                                <i class="fa fa-thumbs-up" style="color: #787878;" id="like_bestanswer_button"></i> <?php echo e($bestAnswer->total_like); ?>

                            <?php endif; ?>
                        <?php else: ?>
                            <i class="fa fa-thumbs-up" style="color:#787878"></i>
                            <?php echo e($bestAnswer->total_like); ?>

                        <?php endif; ?>
                    </div>
                    <div class="col-1" id="large_dislike_bestanswer" data-value="<?php echo e($bestAnswer->id); ?>">
                        <?php if(Auth::check()): ?>
                            <?php if(LikeDislike::where('post_id',$bestAnswer->id)->where('user_id',Auth::user()->id)->where('action','Dislike')->count()!= 0): ?>
                               
                                <i class="fa fa-thumbs-down" style="color: red;" id="dislike_bestanswer_button"></i> <?php echo e($bestAnswer->total_dislike); ?>

                            <?php else: ?>
                              
                                <i class="fa fa-thumbs-down" style="color: #787878;" id="dislike_bestanswer_button"></i> <?php echo e($bestAnswer->total_dislike); ?>

                            <?php endif; ?>
                        <?php else: ?>
                            <i class="fa fa-thumbs-down" style="color:#787878"></i>
                            <?php echo e($bestAnswer->total_dislike); ?>

                        <?php endif; ?>
                    </div>
                    <?php if(Auth::check() and (Auth::user()->id==$question->user_id)): ?>
                        <div class="col-10 justify-content-sm-end">

                            <a href="<?php echo e(asset('removebestanswer')); ?>/<?php echo e($bestAnswer->_id); ?>"><button type="button"
                                    class="float-right btn btn-warning">Remove Best Answer</button></a>
                                   
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <hr>
        <?php endif; ?>
        <!-- End Best Answer Block -->

        <!-- Start Other Answers Block -->
        <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if(($bestAnswer==null) or (($bestAnswer!=null) and ($answer->_id!=$bestAnswer->_id))): ?>
                <div class="row px-3 pt-3">
                    <div class="col-sm-1">
                        <?php if(is_file('storage/avatars/'.$answer->user->avatar)): ?>
                         <a href="/personalinfomation/<?php echo e($answer->user->_id); ?>" class="text-decoration-none"><img src="<?php echo e(asset('storage/avatars')); ?>/<?php echo e($answer->user->avatar); ?>"
                            class="user-avatar rounded-circle align-middle"></a>
                        <?php else: ?>
                        <a href="/personalinfomation/<?php echo e($answer->user->_id); ?>" class="text-decoration-none"><img src="<?php echo e($answer->user->avatar); ?>"
                            class="user-avatar rounded-circle align-middle"></a>
                        <?php endif; ?>
                        <br>
                        <br>
                        <?php if($question->bestAnswer_id == $answer->_id): ?>
                            <div class="d-flex" style="justify-content :center; align-items:center;  font-size:200%; color:#66ad1f">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-11">
                        <div class="float-left">
                            <a href="/personalinfomation/<?php echo e($answer->user->_id); ?>" style="color:#787878; font-size: 20px"><?php echo e($answer->user->fullname); ?></a>
                            <br>
                            <small class="text-muted" style="color:#5488c7;" data-toggle="tooltip" title="<?php echo e($answer->created_at->toDayDateTimeString()); ?>">
                                <i class="fa fa-clock-o" aria-hidden="true"> </i>
                                <?php echo e($answer->created_at->diffForHumans()); ?>

                            </small>
                        </div>

                        <?php if(Auth::check() and (Auth::user()->id==$answer->user_id)): ?>
                       
                            <a href="<?php echo e(asset('editanswer')); ?>/<?php echo e($answer->id); ?>"><i class="float-right fa fa-pencil-square-o ml-2"
                                aria-hidden="true" style="font-size:15px"></i> </a>
                        
                        <?php endif; ?>
                        <br>
                        <br>
                        <br>
                        <div class="image-markdown" style="padding-right: 58px;"><?php echo $answer->content; ?></div>
                        <?php if($answer->attachment_path): ?>
                            <b class="badge badge-warning">Attachments:</b>
                            <a
                                href="<?php echo e(asset('storage/files/'.$answer->attachment_path)); ?>"><i><?php echo e($answer->attachment_path); ?></i></a>
                        <?php endif; ?>
                        <div class="row" style=" color:#787878; font-size: 20px ; margin-bottom: 10px">
                            <div class="col-1" id="large_like_answer" data-value="<?php echo e($answer->id); ?>">
                                <?php if(Auth::check()): ?>
                                    <?php if(LikeDislike::where('post_id',$answer->id)->where('user_id',Auth::user()->id)->where('action','Like')->count()!= 0): ?>
                                       
                                        <i class="fa fa-thumbs-up" style="color: blue;" id="like_answer_button"></i> <?php echo e($answer->total_like); ?>

                                    <?php else: ?>
                                       
                                        <i class="fa fa-thumbs-up" style="color: #787878;" id="like_answer_button"></i> <?php echo e($answer->total_like); ?>

                                    <?php endif; ?>
                                <?php else: ?>
                                        <i class="fa fa-thumbs-up" style="color:#787878"></i>
                                        <?php echo e($answer->total_like); ?>

                                <?php endif; ?>
                            </div>
                            <div class="col-1" id="large_dislike_answer" data-value="<?php echo e($answer->id); ?>">
                                <?php if(Auth::check()): ?>
                                    <?php if(LikeDislike::where('post_id',$answer->id)->where('user_id',Auth::user()->id)->where('action','Dislike')->count()!= 0): ?>
                                      
                                        <i class="fa fa-thumbs-down" style="color: red;" id="dislike_answer_button"></i> <?php echo e($answer->total_dislike); ?>

                                    <?php else: ?>
                                       
                                        <i class="fa fa-thumbs-down" style="color: #787878;" id="dislike_answer_button"></i> <?php echo e($answer->total_dislike); ?>

                                    <?php endif; ?>
                                <?php else: ?>
                                        <i class="fa fa-thumbs-down" style="color:#787878"></i>
                                        <?php echo e($answer->total_dislike); ?>

                                <?php endif; ?>
                            </div>
                            <?php if(Auth::check() and(Auth::user()->id==$question->user_id)): ?>                  
                                <div class='col-10 justify-content-sm-end'>
                                    <a href="<?php echo e(asset('bestanswer')); ?>/<?php echo e($answer->_id); ?>"><button type="button"
                                            class="float-right btn btn-success">Best Answer</button></a>
                                    
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <hr>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="row px-3 pt-3 justify-content-sm-center"><?php echo $answers->links(); ?></div>
    </div>

</div>
<?php echo $__env->make('layout.rightpanel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TLCN\resources\views/question/view_topic.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title','View topic'); ?>

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
<div class="mt-1 d-flex justify-content-center">
<?php echo $__env->make('layout.leftpanel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="card col-7">

    <!-- Start Question Block -->
    <div class="">
        <div class="row px-3 pt-3">

            <div class="col-sm-1"><img src="<?php echo e(asset('storage/avatars')); ?>/<?php echo e($question->user->avatar); ?>"
                    class="user-avatar rounded-circle align-middle"></div>

            <!-- Start Username, Date, Edit, Delete Block -->
            <div class="col-sm-11">
                <div class="font-weight-bold">
                    <a href="/personalinfomation/<?php echo e($question->user->_id); ?>" style="color:#787878; font-size: 20px"><?php echo e($question->user->fullname); ?></a>
                    <!-- Button HTML (to Trigger Modal) -->
                    <?php if((Auth::check()) and ($question->user_id==Auth::user()->id)): ?>
                        <a href="#myModal" data-toggle="modal">
                            <i class="float-right fa fa-trash" aria-hidden="true"
                                style="margin-right:10px; font-size: 30px; "></i></a>
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
                                aria-hidden="true" style="margin-right:10px; font-size:30px"></i></a>
                    <?php endif; ?>

                </div>
                <div>
                    <small class="text-muted" style="color:#5488c7;">
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
                    <span class="badge badge-info d-flex" style="height: 32px"><?php echo e($question->category->name); ?></span>
                </h3>
            </div>
            <!-- End Question Title Block -->

            <!-- Start Question Content Block -->
            <div class="col-sm-12 px-3">
                <div class="image-markdown"><?php echo $question->content; ?></div>
                <?php if($question->attachment_path): ?>
                <b class="badge badge-warning">Attachment:</b>
                <a
                    href="<?php echo e(asset('storage/files/'.$question->attachment_path)); ?>"><i><?php echo e($question->attachment_path); ?></i></a>

                <?php endif; ?>
                <div class="row"
                    style="width: 500px; color:#787878; font-size: 20px; margin-bottom: 10px; margin-left: 5px;">
                    <div class="col-xs" style="width:70px">
                        <?php if(Auth::check()): ?>
                            <a href="<?php echo e(asset('like')); ?>/<?php echo e($question->_id); ?>/Question">
                                <i class="fa fa-thumbs-up"></i></a> <?php echo e($question->total_like); ?>

                        <?php else: ?>
                            <i class="fa fa-thumbs-up" style="color:#787878"></i>
                            <?php echo e($question->total_like); ?>

                        <?php endif; ?>
                    </div>
                    <div class="col-xs" style="width:70px">
                        <?php if(Auth::check()): ?>
                            <a href="<?php echo e(asset('dislike')); ?>/<?php echo e($question->_id); ?>/Question">
                                <i class="fa fa-thumbs-down"></i></a> <?php echo e($question->total_dislike); ?>

                        <?php else: ?>
                            <i class="fa fa-thumbs-down" style="color:#787878"></i>
                            <?php echo e($question->total_dislike); ?>

                        <?php endif; ?>
                    </div>
                    <div class="col-xs" style="width:70px">
                        <i class="fa fa-reply"></i> <?php echo e($question->total_answer); ?>

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
    <div class="" style="margin-top: 20px; margin-bottom: 20px; ">
        <div class="card-header">
            <h3><i class="fa fa-angle-double-right"></i> Answers:</h3>
        </div>

        <!-- Start Best Answer Block -->
        <?php if($bestAnswer!=null): ?>
        <div class="row px-3 pt-3">
            <div class="col-1">
                <img src="<?php echo e(asset('storage/avatars')); ?>/<?php echo e($bestAnswer->user->avatar); ?>"

                    class="user-avatar rounded-circle align-middle">
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
                    <small class="text-muted" style="color:#5488c7;">
                        <i class="fa fa-clock-o" aria-hidden="true"> </i>
                        <?php echo e($bestAnswer->created_at->diffForHumans()); ?>

                    </small>
                </div>

                <?php if(Auth::check() and (Auth::user()->id==$bestAnswer->user_id)): ?>
                    <a href="<?php echo e(asset('editanswer')); ?>/<?php echo e($bestAnswer->id); ?>">
                        <i class="float-right fa fa-pencil-square-o ml-2" aria-hidden="true" style="font-size:30px"></i>
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
                    <div class="col-1">
                        <?php if(Auth::check()): ?>
                            <a href="<?php echo e(asset('like')); ?>/<?php echo e($bestAnswer->_id); ?>/Answer">
                                <i class="fa fa-thumbs-up"></i></a> <?php echo e($bestAnswer->total_like); ?>

                        <?php else: ?>
                            <i class="fa fa-thumbs-up" style="color:#787878"></i>
                            <?php echo e($bestAnswer->total_like); ?>

                        <?php endif; ?>
                    </div>
                    <div class="col-1">
                        <?php if(Auth::check()): ?>
                            <a href="<?php echo e(asset('dislike')); ?>/<?php echo e($bestAnswer->_id); ?>/Answer">
                                <i class="fa fa-thumbs-down"></i></a> <?php echo e($bestAnswer->total_dislike); ?>

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
                        <img src="<?php echo e(asset('storage/avatars')); ?>/<?php echo e($answer->user->avatar); ?>"
                            class="user-avatar rounded-circle align-middle">
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
                            <small class="text-muted" style="color:#5488c7;">
                                <i class="fa fa-clock-o" aria-hidden="true"> </i>
                                <?php echo e($answer->created_at->diffForHumans()); ?>

                            </small>
                        </div>

                        <?php if(Auth::check() and (Auth::user()->id==$answer->user_id)): ?>
                       
                            <a href="<?php echo e(asset('editanswer')); ?>/<?php echo e($answer->id); ?>"><i class="float-right fa fa-pencil-square-o ml-2"
                                aria-hidden="true" style="font-size:30px"></i> </a>
                        
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
                            <div class="col-1">
                                <?php if(Auth::check()): ?>
                                    <a href="<?php echo e(asset('like')); ?>/<?php echo e($answer->_id); ?>/Answer">
                                        <i class="fa fa-thumbs-up"></i></a> <?php echo e($answer->total_like); ?>

                                <?php else: ?>
                                    <i class="fa fa-thumbs-up"></i>
                                    <?php echo e($answer->total_like); ?>

                                <?php endif; ?>
                            </div>
                            <div class="col-1">
                                <?php if(Auth::check()): ?>
                                    <a href="<?php echo e(asset('dislike')); ?>/<?php echo e($answer->_id); ?>/Answer">
                                        <i class="fa fa-thumbs-down"></i></a>
                                    <?php echo e($answer->total_dislike); ?>

                                <?php else: ?>
                                    <i class="fa fa-thumbs-down"></i>
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
<?php $__env->startSection('title','TechSolution'); ?>
<?php $__env->startSection('content'); ?>

<main>

    <img src="<?php echo e(asset('images/resource/slogan.png')); ?>" style="height:15%" alt="placeholder+image">



    <div class="mt-1 d-flex justify-content-center">
        <?php echo $__env->make('layout.leftpanel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card col-7">
            <div class="card-header text-center" style="background-color: white">
                <ul class="nav nav-pills font-weight-bold" >
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Recent Question</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mostanswered">Most Answered</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="noanswers">No Answers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="week">Week</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="month">Month</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="year">Year</a>
                    </li>
                </ul>
                <br/>
                <h5 class="text-left"><?php echo e(number_format($questions->count())); ?> questions</h5>
            </div>

            <div class="card-body p-0">
                <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row px-3 pt-3">
                    <div class="col-sm-1"><img src="<?php echo e(asset('storage/avatars')); ?>/<?php echo e($question->user->avatar); ?>"
                            class="img-fluid rounded-circle align-middle user-avatar"></div>
                    <div class="col-sm-11">
                        <a href="/personalinfomation/<?php echo e($question->user->_id); ?>" class="text-decoration-none">
                            <small class="font-weight-bold" style="color:#5488c7;"><?php echo e($question->user->fullname); ?></small>
                        </a>
                        <small class="text-muted pl-4" style="color:#5488c7;">asked:
                            <?php echo e($question->created_at->diffForHumans()); ?>

                        </small>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <div class="word-wrap">
                                    <a class="text-decoration-none" href="topic/<?php echo e($question->id); ?>">
                                        <h5><?php echo e($question->title); ?></h5>
                                    </a></div>


                            </div>
                            <!-- <div class="col-2">
                                <small
                                    class="float-right border rounded-pill text-primary bg-light p-2 font-weight-bold"><?php echo e($question->category->name); ?></small>
                            </div> -->
                        </div>

						<p class="pv-archiveText"><?php echo e($question->content); ?></p>
						<!-- QuyTran added -->
                        <div class="row">
                            <div class="pl-3 pt-1 pb-3">
                                <a href="#" class="border text-muted p-1 rounded ">
                                    <?php echo e($question->category->name); ?>

                                </a>

                            </div>
						</div>
						<!-- QuyTran end add -->
						<div class="ml-3">
						<?php echo $__env->make('layout.like_dislike', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						</div>
                        
                    </div>

                </div>
                <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="row px-3 pt-3 justify-content-sm-center"><?php echo $questions->links(); ?></div>
            </div>
        </div>
        <?php echo $__env->make('layout.rightpanel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TLCN\resources\views/home.blade.php ENDPATH**/ ?>
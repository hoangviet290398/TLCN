<?php $__env->startSection('title','TechSolution'); ?>
<?php $__env->startSection('content'); ?>

<main>
	<div class="container mt-5">
		<div class="card shadow">
			<div class="card-header text-center">
				<h3><i class="fa fa-angle-double-left"></i> Questions <i class="fa fa-angle-double-right"></i></h3>
			</div>
			<div class="card-body p-0">
				<?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="row px-3 pt-3">
					<div class="col-sm-1"><img src="<?php echo e(asset('storage/avatars')); ?>/<?php echo e($question->user->avatar); ?>" class="img-fluid rounded-circle align-middle user-avatar" ></div>
					<div class="col-sm-11">
							<a href="/personalinfomation/<?php echo e($question->user->_id); ?>">
								<small class="font-weight-bold" style="color:#5488c7;"><?php echo e($question->user->fullname); ?></small>
							</a>
						<small class="text-muted" style="color:#5488c7;">
							<?php echo e($question->created_at->diffForHumans()); ?>

						</small>
						<br>
						<div class="row">
							<div class="col-10">
								<div class="word-wrap"><a href="topic/<?php echo e($question->id); ?>"><h5><?php echo e($question->title); ?></h5></a></div>
							</div>
							<div class="col-2">
								<small class="float-right border rounded-pill text-primary bg-light p-2 font-weight-bold"><?php echo e($question->category->name); ?></small>
							</div>
						</div>

						<p class="pv-archiveText"><?php echo e($question->content); ?></p>
						<?php echo $__env->make('layout.like_dislike', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</div>

				</div>
				<hr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<div class="row px-3 pt-3 justify-content-sm-center"><?php echo $questions->links(); ?></div>
			</div>
		</div>
	</div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TLCN\resources\views/home.blade.php ENDPATH**/ ?>
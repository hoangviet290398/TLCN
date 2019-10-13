<?php $__env->startSection('title','TechSolution'); ?>
<?php $__env->startSection('content'); ?>

<main>
	<img src="<?php echo e(asset('images/resource/slogan.png')); ?>" alt="placeholder+image">
	<div class="container mt-1 d-flex justify-content-center">
		<div class="" style="width: 20%; background-color: #dfe4ea">
			<div>
				<h6 class="font-weight-bold ml-3 mt-4"><i class="fa fa-home mr-3"></i>Home</h6>
			</div>

			<div>
				<h6 class="font-weight-bold ml-3 mt-4"><i class="fa fa-tags mr-3"></i>Tags</h6>
			</div>

			<div>
				<h6 class="font-weight-bold ml-3 mt-4"><i class="fa fa-users mr-3"></i>Users</h6>
			</div>

			<div>
				<h6 class="font-weight-bold ml-3 mt-4"><i class="fa fa-question-circle mr-3"></i>Help</h6>
			</div>
		</div>
		<div class="card ml-2" style="width: 70%">
			<div class="card-header text-center" style="background-color: white">
				<ul class="nav nav-pills">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="pill" href="#home">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="pill" href="#menu1">Menu 1</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="pill" href="#menu2">Menu 2</a>
					</li>
				</ul>
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
		<div class="card ml-2" style="width: 30%">

			<div class="card-header text-center" style="background-color: white">
				<?php if(Auth::check()): ?>
				<div class="col-0.5">
					<!-- start add button block -->
					<a href="<?php echo e(route('addTopic')); ?>" class="btn btn-primary btn-block font-weight-bold">Ask a Question</a>
					<!-- end add button block -->
				</div>
				<?php endif; ?>
			</div>

			
			<div class="container">
				<div class="row text-center" style="font-size: 12px">
					<div class="col-2"></div>
					<div class="col-4">Questions</div>
					<div class="col-4">Answers</div>
					<div class="col-2"></div>
				</div>
				<div class="row text-center" style="font-size: 12px">
					<div class="col-2"></div>
					<div class="col-4">Best Answer</div>
					<div class="col-4">Users</div>
					<div class="col-2"></div>
				</div>
			</div>


			<div class="card">
				<h6 class="font-weight-bold ml-3 mt-4"><i class="fa fa-users mr-3"></i>Top Members</h6>
				
			</div>

			<div class="card">
				<h6 class="font-weight-bold ml-3 mt-4"><i class="fa fa-tags mr-3"></i>Trending Tags</h6>
			</div>
		</div>
	</div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TLCN\resources\views/home.blade.php ENDPATH**/ ?>
<div class="row bg-light py-3" style="width: 97%; color:gray;">
    <div class="border rounded text-muted bg-white col-sm-2 text-center ml-3">
        <i class="fa fa-thumbs-up"></i>
        <?php echo e($question->total_like); ?> likes
    </div>
    <div class="p-2"></div>
    <div class="border rounded text-muted bg-white col-sm-3 text-center">
        <i class="fa fa-thumbs-down"></i>
        <?php echo e($question->total_dislike); ?> dislikes
    </div>
    <div class="p-2"></div>
    <div class="border rounded text-muted bg-white col-sm-3 text-center">
        <i class="fa fa-comment"></i>
        <?php echo e($question->total_answer); ?> answers


	</div>
	
	<div class="col-2"></div>
	<div class="p-2"></div>
	<div class="p-1"></div>
	
    <div class="col-3 ml-1">
	<a href="#" class="border rounded text-light bg-dark col-sm-2 text-center">Answer</a>
    </div>

</div><?php /**PATH C:\xampp\htdocs\TLCN\resources\views/layout/like_dislike.blade.php ENDPATH**/ ?>
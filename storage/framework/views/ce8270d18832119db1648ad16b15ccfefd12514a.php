<div class="row col-sm-12 bg-light py-3" style="">
    <div class="col-sm-3 px-1">
        <div class="border rounded text-muted bg-white text-center px-1">
            <i class="fa fa-thumbs-up"></i>
            <?php echo e($question->total_like); ?> likes
        </div>
    </div>
    <div class="col-sm-3 px-1">
        <div class="border rounded text-muted bg-white text-center">
            <i class="fa fa-thumbs-down"></i>
            <?php echo e($question->total_dislike); ?> dislikes
        </div>
    </div>

    <div class="col-sm-3 px-1">
        <div class="border rounded text-muted bg-white text-center">
            <i class="fa fa-comment"></i>
            <?php echo e($question->total_answer); ?> answers
        </div>
    </div>


    <div class="col-sm-3">
        <a href="#" class="border rounded text-light bg-dark text-center px-4" style="font-size:18px">Answer</a>

    </div>

</div><?php /**PATH C:\xampp\htdocs\TLCN\resources\views/layout/like_dislike.blade.php ENDPATH**/ ?>
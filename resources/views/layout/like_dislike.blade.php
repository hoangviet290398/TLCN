<div class="row bg-light py-3" style="width: 97%; color:gray;">
    <div class="border rounded text-muted bg-white col-2 text-center ml-3">
        <i class="fa fa-thumbs-up"></i>
        {{$question->total_like}} likes
    </div>
    <div class="p-2"></div>
    <div class="border rounded text-muted bg-white col-2 text-center">
        <i class="fa fa-thumbs-down"></i>
        {{$question->total_dislike}} dislikes
    </div>
    <div class="p-2"></div>
    <div class="border rounded text-muted bg-white col-2 text-center">
        <i class="fa fa-comment"></i>
        {{$question->total_answer}} answers


	</div>
	
	<div class="col-3"></div>
	<div class="p-2"></div>
	<div class="p-1"></div>
	
    <div class="col-2 ml-1">
	<a href="#" class="border rounded text-light bg-dark col-2 text-center" style="font-size:20px">Answer</a>
    </div>

</div>
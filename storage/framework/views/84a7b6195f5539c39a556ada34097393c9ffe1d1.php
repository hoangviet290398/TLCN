
<nav class="navbar navbar-expand-lg navbar-light shadow sticky-top" style="background-color: rgb(39, 41, 48); height:80px">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <!-- start logo block -->
                <a class="navbar-brand" href="<?php echo e(route('homePage')); ?>"><b style="font-size:20px">
                    <img src="<?php echo e(asset('images/resource/logo2a.png')); ?>" width="40px"> TechSolution</b></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- end logo block -->
            </div>

   

            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(39, 41, 48)">
  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link text-light font-weight-bold" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light font-weight-bold" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light font-weight-bold" href="#">Contact Us</a>
                </li>

                <!-- start collapse block -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex justify-content-start" style="width:100%">
                        <div class="col-6">

                            <!-- start search block -->
                            <form id="searchform" class="form-inline-xs" action="<?php echo e(route('searchIndex')); ?>" method="get">
                                <div class="input-group">
                                    <input id="search" name="keyword" class="form-control input-sm" type="search" placeholder="Search..."
                                    title="enter your keyword" autocomplete="off">
                                    <div id="result_list" class="scrollbar scrollbar-lady-lips dropdown-menu"></div>
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-dark font-weight-bold" type="button"
                                        onclick="submit_search()">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- end search block -->

                    </div>
                    <?php if(Auth::check()): ?>
                    <div class="col-0.5">
                        <!-- start add button block -->
                        <a href="<?php echo e(route('addTopic')); ?>" class="btn btn-outline-secondary"><i class="fa fa-plus"></i></a>
                        <!-- end add button block -->
                    </div>
                    <div class="col-0.5">
                        <!-- start notification block -->
                        <div class="nav-item dropright">
                            <button class="btn btn-link" id="notify" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" onclick="read_notification()">
                            <?php if(Auth::user()->notifications()->where('is_read',false)->count()): ?>
                            <i id="notification_bell" class="fa fa-bell text-danger" style="font-size: 18px"></i>
                            <div id="unread_notification" class="text-danger float-right ml-1 font-weight-bold"><?php echo e(Auth::user()->notifications->where('is_read',false)->count()); ?></div>
                            <?php else: ?>
                            <i id="notification_bell" class="fa fa-bell" style="font-size: 18px"></i>
                            <?php endif; ?>
                        </button>
                        <div class="scrollbar scrollbar-lady-lips dropdown-menu" aria-labelledby="notify" style="width: 350px">
                            <div style="text-align: center;">
                                <h4>Notifications</h4>
                            </div>
                            <?php $__currentLoopData = Auth::user()->notifications()->orderBy('created_at', 'DESC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row" >
                                <div class="col-sm-10">
                                    <div class=" ml-2">
                                        <a href="/topic/<?php echo e($notification->question_id); ?>">
                                            <?php echo e($notification->actor()->first()->fullname.' '.$notification->action.' your '.$notification->target); ?>

                                        </a>
                                        <br>
                                        <small><?php echo e($notification->created_at->diffForHumans()); ?></small>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <a href="/removenotification/<?php echo e($notification->_id); ?>"
                                        class="btn btn-sm btn-outline-dark float-right mr-2 mt-1" title="Remove"><span
                                        class="fa fa-close"></span></a>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <!-- end notification block -->
                    </div>

                    <ul class="navbar-nav mr-auto"></ul>

                    <!-- start user menu block -->
                    <div class="col-0.5 pt-2">
                        <b class="text-dark"><?php echo e(Auth::user()->fullname); ?></b>
                    </div>
                    <div class="col-0.5">
                        <div class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle text-dark" id="setting" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                            class="fa fa-user"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="setting">
                                <a class="dropdown-item" href="<?php echo e(route('information')); ?>">
                                    <i class="fa fa-cog" style="width:20px"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="<?php echo e(route('manageQuestion')); ?>">
                                    <i class="fa fa-comments-o" style="width:20px"></i>
                                    Your questions
                                </a>
                                <a class="dropdown-item" href="<?php echo e(route('manageAnswer')); ?>">
                                    <i class="fa fa-lightbulb-o" style="width:20px"></i>
                                    Your answers
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="<?php echo e(route('logOut')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="dropdown-item">
                                        <i class="fa fa-sign-out" style="width:20px"></i>
                                        Sign out
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- end user menu block -->
                    <?php else: ?>
                    <div class="col-sm ">
                    <!-- start sign in or sign up block -->
                    <ul class="navbar-nav mr-auto"></ul>
                    <a href="<?php echo e(route('signInIndex')); ?>" class="btn btn-primary">Sign in</a>
                    <a href="<?php echo e(route('signUp')); ?>" class="btn btn-secondary ml-3">Sign up</a>
                    <!-- end sign in or sign up block -->
                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    </ul>
</div>
</nav>


</nav>
<?php /**PATH C:\xampp\htdocs\TLCN\resources\views/layout/header.blade.php ENDPATH**/ ?>
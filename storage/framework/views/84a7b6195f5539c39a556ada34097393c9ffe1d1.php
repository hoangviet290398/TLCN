
<nav class="navbar navbar-expand-lg navbar-light shadow sticky-top" style="background-color: rgb(39, 41, 48); height:80px">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <!-- start logo block -->
                <a class="navbar-brand" href="<?php echo e(route('homePage')); ?>"><b style="font-size:20px;color:white">
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
                        <a class="nav-link text-light header" href="<?php echo e(route('homePage')); ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light header" href="<?php echo e(route('aboutUs')); ?>">About Us</a>
                    </li>
                   

                    <!-- start collapse block -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="d-flex justify-content-start" style="width:100%">
                            <div class="col-12">

                                <!-- start search block -->
                                <form id="searchform" class="form-inline-xs" action="<?php echo e(route('searchIndex')); ?>" method="get">
                                    <div class="input-group form-control-sm">
                                        <?php if(isset($keyword)): ?>
                                        <input id="search" name="keyword" class="form-control form-control-sm" type="search" placeholder="Type search words"
                                        title="enter your keyword" autocomplete="off" value="<?php echo e($keyword); ?>">
                                        <?php else: ?>
                                        <input id="search" name="keyword" class="form-control form-control-sm" type="search" placeholder="Type search words"
                                        title="enter your keyword" autocomplete="off">
                                        <?php endif; ?>
                                        <div id="result_list" class="scrollbar scrollbar-lady-lips dropdown-menu"></div>
                                 
                            </div>
                        </form>
                        <!-- end search block -->

                    </div>
                    <?php if(Auth::check()): ?>
                  
                    <div class="col-0.5">
                        <!-- start notification block -->
                        <div class="nav-item dropdown no-arrow ">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="read_notification()">
                            <i class="fa fa-bell" style="color: white"></i>
                            <?php if(Auth::user()->notifications()->where('is_read',false)->count()): ?>
                            <span class="badge badge-danger badge-counter"><?php echo e(Auth::user()->notifications->where('is_read',false)->count()); ?></span>

                            <?php else: ?>

                            <?php endif; ?>
                            <!-- Counter - Alerts -->

                        </a>

                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="">
                        <h6 class="dropdown-header bg-primary" style="color:white;">
                            Notification
                        </h6>
                        <?php $__currentLoopData = Auth::user()->notifications()->orderBy('created_at', 'DESC')->take(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="dropdown-item d-flex align-items-center noti_item" href="/topic/<?php echo e($notification->question_id); ?>" style="border-width: 1px; border-bottom-style: solid; border-color: #b2bec3;">
                            <?php if(is_file('storage/avatars/'.$notification->actor()->first()->avatar)): ?>
                                    <img src="<?php echo e(asset('storage/avatars')); ?>/<?php echo e($notification->actor()->first()->avatar); ?>" class="dot mr-4">
                            <?php else: ?>
                                <img src="<?php echo e($notification->actor()->first()->avatar); ?>" class="dot mr-4">
                            <?php endif; ?>
                            
                            <div>

                               
                           
                                <div class="small text-gray-500" style="font-size: 10px"><?php echo e($notification->created_at->toDayDateTimeString()); ?></div>
                                <span class="font-weight-bold" style="color:#1e3799;font-size: 13px"> <?php echo e($notification->actor()->first()->fullname.' '.$notification->action.' your '.$notification->target); ?></span>

                            </div>

                             
                        </a>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        <a class="dropdown-item text-center small text-gray-500 noti_item" href="#">Show All Alerts</a>
                    </div>
                </div>
                <!-- end notification block -->
            </div>

            <ul class="navbar-nav mr-auto"></ul>

            <!-- start user menu block -->

            <div class="col-3 pt-2 ml-5">
                <b class="text-light header"><?php echo e(Auth::user()->fullname); ?></b>
            </div>
            <div class="col-0.5">
                <div class="nav-item dropdown">
                    <?php if(is_file('storage/avatars/'.Auth::user()->avatar)): ?>
                    
                        <a href="" class="nav-link dropdown-toggle text-light" id="setting" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img class="dot" src="<?php echo e(asset('storage/avatars')); ?>/<?php echo e(Auth::user()->avatar); ?>"></a>
                    <?php else: ?>
                    <a href="" class="nav-link dropdown-toggle text-light" id="setting" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img class="dot" src="<?php echo e(Auth::user()->avatar); ?>"></a>
                    <?php endif; ?>
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
            <div class="col-sm-6 mt-1 ml-4">
                <!-- start sign in or sign up block -->
                <ul class="navbar-nav mr-auto"></ul>
                <a href="<?php echo e(route('signInIndex')); ?>" class="btn btn-primary btn-sm font-weight-bold pl-3 pr-3">Sign in</a>
                <a href="<?php echo e(route('signUp')); ?>" class="btn btn-outline-secondary ml-3 btn-sm font-weight-bold pl-3 pr-3" style="color: white">Sign up</a>
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
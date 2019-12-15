<!DOCTYPE html>
<html>
<head>
    <?php echo $__env->make('layout.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('css'); ?>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body class="main-background">

    <?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    
    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('layout.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('js'); ?>

    <script>
      

       $('#search').keyup(function () {
        var keyword = $(this).val();
        if (keyword != '') {
            $.ajax({
                url: "<?php echo e(route('ajaxSearch')); ?>",
                method: "GET",
                data: {
                    keyword
                },
                success: function (data) {
                  if(data!=""){
                    $('#result_list').empty();
                    $('#result_list').html(data);
                    $('#result_list').show();
                }
                else{
                    $('#result_list').hide();
                }
            }
        })
        }
        else{
            $('#result_list').hide();
        }
    });

       $('#searchTags').keyup(function () {
        var keyword = $(this).val();
        if (keyword != '') {
            $.ajax({
                url: "<?php echo e(route('ajaxSearchTags')); ?>",
                method: "GET",
                data: {
                    keyword
                },
                success: function (data) {
                    if(data!=""){
                        $('#allTags').empty();
                        $('#allTags').html(data);
                        $('#allTags').show();
                    }
                    else{
                        $('#allTags').hide();
                    }
                }
            })
        }
        else{
            $.ajax({
                url: "<?php echo e(route('ajaxSearchTags1')); ?>",
                method: "GET",
                data: {
                    keyword
                },
                success: function (data) {
                    if(data!=""){
                        $('#allTags').empty();
                        $('#allTags').html(data);
                        $('#allTags').show();
                    }
                    else{
                        $('#allTags').hide();
                    }
                }
            })
        }
    });

       $('#searchUsers').keyup(function () {
        var keyword = $(this).val();
        if (keyword != '') {
            $.ajax({
                url: "<?php echo e(route('ajaxSearchUsers')); ?>",
                method: "GET",
                data: {
                    keyword
                },
                success: function (data) {
                    if(data!=""){
                        $('#allU').empty();
                        $('#allU').html(data);
                        $('#allU').show();
                    }
                    else{
                        $('#allU').hide();
                    }
                }
            })
        }
        else{
            $.ajax({
                url: "<?php echo e(route('ajaxSearchUsers1')); ?>",
                method: "GET",
                data: {
                    keyword
                },
                success: function (data) {
                    if(data!=""){
                        $('#allU').empty();
                        $('#allU').html(data);
                        $('#allU').show();
                    }
                    else{
                        $('#allU').hide();
                    }
                }
            })
        }
    });


       function submit_search(){
        if($('#search').val()!='') $('#searchform').submit();
    }
    <?php if(Auth::check()): ?>
    function read_notification(){
        $.ajax({
            url: "<?php echo e(route('readNotification')); ?>",
            method: "GET"
        })
        $("#notification_bell").removeClass("text-danger");
        $("#unread_notification").remove();
    }
    <?php endif; ?>


</script>
</body>
<?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</html>
<?php /**PATH C:\xampp\htdocs\TLCN\resources\views/layout/master.blade.php ENDPATH**/ ?>
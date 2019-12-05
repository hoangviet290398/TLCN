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
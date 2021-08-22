<?php $__env->startSection('content'); ?>

<div class="container">
    
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>
               
                
                <div class="card-body">
                    <div class="sidebar">
                        
                    </div>
                    <div>
                        <?php if(Auth::user()->type==0): ?>
                        <?php echo e(__('You are logged in!'.Auth::user()->name)); ?>

                        
                    <?php else: ?>
                    <?php echo e(__('You are logged in! but you are type '.Auth::user()->type)); ?>      
                    <?php endif; ?>
                    </div>

                    
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projects\ticketUI\resources\views/home.blade.php ENDPATH**/ ?>
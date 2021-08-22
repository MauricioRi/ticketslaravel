

<?php $__env->startSection('title', 'Crear ruta'); ?>
    
<?php $__env->startSection('content'); ?>



     <form action="<?php echo e(route("rutas.store")); ?>" method="POST">
       
        <?php echo csrf_field(); ?>
       
        nombre de la ruta :
        <label for=""><input type="text" value="<?php echo e(old('name')); ?>" name="name"></label><br>
        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <br>
            <small>*<?php echo e($message); ?></small>
            <br>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        descripcion :
        <label for=""><input type="text"  value="<?php echo e(old('description')); ?>" name="description"></label><br>
        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <br>
            <small>*<?php echo e($message); ?></small>
            <br>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        numero de puntos :
        <label for=""><input type="number" value="<?php echo e(old('numberpoints')); ?>" name="numberpoints"></label><br>
        <?php $__errorArgs = ['numberpoints'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <br>
            <small>*<?php echo e($message); ?></small>
            <br>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>






        <button type="submit">crear ruta</button>
     </form>


     
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\GitHub\ticketslaravel\ticketUI\resources\views/rutas/create.blade.php ENDPATH**/ ?>
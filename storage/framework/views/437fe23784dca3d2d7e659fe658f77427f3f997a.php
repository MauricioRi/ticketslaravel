



<?php $__env->startSection('title', 'Editar Ruta'); ?>
    
<?php $__env->startSection('content'); ?>



     <form action="<?php echo e(route("rutas_update","$ruta->id")); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>
        nombre de la ruta :
        <label for=""><input type="text" value="<?php echo e(old('name',$ruta->Name_route)); ?>"  name="name"></label><br>
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
        <label for=""><input type="text"  value="<?php echo e(old('description',$ruta->Name_route)); ?>" name="description"></label><br>
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
        <label for=""><input type="number" value="<?php echo e(old('numberpoints',$ruta->number_points)); ?>" name="numberpoints"></label><br>
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

        <button type="submit">Actualizar ruta</button>
     </form> 
     <table class="default" border="1">

<tr>

     <?php for($fila = 1; $fila <($ruta->number_points)+1; $fila++): ?>
     <?php for($columna = 1; $columna <($ruta->number_points)+1; $columna++): ?>
    <?php if($fila==1 || $columna==1): ?>
    <td>CARGANDO...</td>
    
    <?php elseif($fila==$columna): ?>
    <td>$<input type="number" id="<?php echo e($fila."-".$columna); ?>" name="<?php echo e($fila."-".$columna); ?>" value="<?php echo e($fila.".".$columna); ?>"></td>
        
<?php elseif($fila>$columna): ?>
<td>NO DISPONIBLE</td>
<?php else: ?>
<td>$<input type="number" id="<?php echo e($fila."-".$columna); ?>" name="<?php echo e($fila."-".$columna); ?>" value="<?php echo e($fila.".".$columna); ?>"></td>   


<?php endif; ?>
<?php endfor; ?>
</tr>

 <?php endfor; ?>
</table>
<br>
<br>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\GitHub\ticketslaravel\resources\views/rutas/edit.blade.php ENDPATH**/ ?>
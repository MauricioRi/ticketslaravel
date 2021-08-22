

<?php $__env->startSection('content'); ?>

    <div class="wrapper">

        <div class="main-panel">
            h1>Listar Rutas </h1>
            <a href="<?php echo e(route('crear_Rutas')); ?>">crear ruta </a>

            <table class="default" border="1">
                <tr>
                    <td>ID RUTA</td>

                    <td>NOMBRE DE RUTA</td>
                    <td>DESCRIPCIÓN</td>
                    <td>NUM PUNTOS</td>
                    <td>ACCIÓN</td>

                </tr>
                <?php $__currentLoopData = $ruta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rutas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($rutas->id); ?></td>
                        <td> <?php echo e($rutas->Name_route); ?></td>
                        <td><?php echo e($rutas->description); ?></td>
                        <td><?php echo e($rutas->number_points); ?></td>

                        <td><a href="<?php echo e(route('editar_Rutas', $rutas->id)); ?>}">editar</a></td>




                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </table>
            <?php echo e($ruta->links()); ?>


        </div>
    </div>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\GitHub\ticketslaravel\ticketUI\resources\views/ruta.blade.php ENDPATH**/ ?>
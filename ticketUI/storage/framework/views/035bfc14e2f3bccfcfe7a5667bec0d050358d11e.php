

<?php $__env->startSection('content'); ?>
    <script>
        window.onload = function() {
            var button = document.getElementById("enter");
            var input = document.getElementById("userinput");
            var ul = document.getElementById("lista");


            button.onclick = function() {
                if (input.value != '') {
                    var li = document.createElement("li");
                    li.appendChild(document.createTextNode(input.value));
                    li.className = "list-group-item";
                    ul.appendChild(li);
                    input.value = '';
                }

            };
        }

    </script>
    <div class="main-panel">
        <form method="POST" action="<?php echo e(route('crear')); ?>">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username"
                    aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">Button</button>
                </div>
            </div>
        </form>
    </div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projects\ticketUI\resources\views/addmainroute.blade.php ENDPATH**/ ?>
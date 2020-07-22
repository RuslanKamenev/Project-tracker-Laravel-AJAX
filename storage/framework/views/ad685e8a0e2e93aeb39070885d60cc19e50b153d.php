<?php echo $__env->make('includes.result_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container" id="page-body">
    <div class="raw justify-content-center">
        <div class="col-md-5 p-lg-3 mx-auto text-center">
            <h1>Мои проекты</h1>
            <button id="add-new" type="button" class="btn btn-primary my-2">
                Добавить проект
            </button>
        </div>


        <div class="col-md-12">

            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('project.project', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>

    <?php if( $projects->total() > $projects->count() ): ?>
        <div class="card m-md-4 paginate-links" id="projects-paginate">
            <div class="card-body col-md-12 justify-content-center">
                <?php echo e($projects->links()); ?>

            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH G:\HTML\Progi\OpenServer\OpenServer\domains\TestWork\resources\views/projects/only_projects.blade.php ENDPATH**/ ?>
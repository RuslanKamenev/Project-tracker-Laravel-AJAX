
<div class="col-md-5 p-lg-3 mx-auto text-center">
    <h1>Проект</h1>
    <h3><?php echo e($project->title); ?></h3>
    <button id="all-projects" type="button" class="btn btn-primary my-2">
        Вернутся на страницу проектов
    </button>
</div>


<?php echo $__env->make('project.project_description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="m-3 row">
    <div class="col-md-10">
        <h4>Задачи:</h4>
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary" id="create-task">
            Создать задачу
        </button>
    </div>
</div>

<?php echo $__env->make('task.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if( $tasks->total() > $tasks->count() ): ?>
    <div class="card m-md-4 paginate-links" id="tasks-paginate">
        <div class="card-body col-md-12 justify-content-center">
            <?php echo e($tasks->links()); ?>

        </div>
    </div>
<?php endif; ?>

<?php /**PATH G:\HTML\Progi\OpenServer\OpenServer\domains\TestWork\resources\views/project/index.blade.php ENDPATH**/ ?>
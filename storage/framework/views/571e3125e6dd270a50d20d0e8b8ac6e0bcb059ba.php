<div class="card m-md-2" id="project-id">
    <input type="text" value="<?php echo e($project->id); ?>" hidden>
    <div class="row m-md-2">
        <div class="card-body col-md-10"><b>Описание проекта:</b></div>
        <div class="card-body col-md-2 p-0">
            <button id="edit-project" type="button" class="btn btn-primary my-2">
                <input type="text" value="<?php echo e($project->id); ?>" hidden>
                Редактировать проект
            </button>
        </div>
    </div>
    <div class="card-body"><?php echo e($project->description); ?></div>
</div>
<?php /**PATH G:\HTML\Progi\OpenServer\OpenServer\domains\TestWork\resources\views/project/project_description.blade.php ENDPATH**/ ?>
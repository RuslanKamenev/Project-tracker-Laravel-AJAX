<div class="raw justify-content-center">

    <div class="col-md-5 p-lg-3 mx-auto text-center">
        <h1>Редактирование проекта</h1>
        <button type="button" class="btn btn-primary my-2 project-id">
            <input type="text" value="<?php echo e($project->id); ?>" hidden>
            Отменить редактирование
        </button>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label for="project-name">Название проекта</label>
                        <input type="text" id="project-title" name="project-name" class="form-control" value="<?php echo e($project->title); ?>">
                    </div>

                    <div class="form-group">
                        <label for="project-description">Краткое описание</label>
                        <textarea rows="5" id="project-description" name="project-description" class="form-control"><?php echo e($project->description); ?></textarea>
                    </div>

                    <div class="form-group row px-3">
                        <div class="mr-auto">
                            <button type="submit" id="project-changes-save" name="change-project" class="btn btn-primary" onclick="event.preventDefault()">Сохранить изменения</button>
                        </div>
                        <div class="">
                            <button type="submit" id="project-delete" class="btn btn-danger" onclick="event.preventDefault()">Удалить проект</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH G:\HTML\Progi\OpenServer\OpenServer\domains\TestWork\resources\views/project/edit.blade.php ENDPATH**/ ?>
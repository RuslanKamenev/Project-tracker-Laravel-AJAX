<div class="raw justify-content-center">

    <?php echo $__env->make('includes.back_projects', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="project-name">Введите название проекта</label>
                        <input type="text" name="title" class="form-control" id="new-project-name">
                    </div>

                    <div class="form-group">
                        <label for="project-description">Краткое описание</label>
                        <textarea rows="5" name="description" class="form-control" id="new-project-description"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="add-project">Создать проект</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH G:\HTML\Progi\OpenServer\OpenServer\domains\TestWork\resources\views/project/create.blade.php ENDPATH**/ ?>
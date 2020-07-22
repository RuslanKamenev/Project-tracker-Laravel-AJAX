<div class="raw justify-content-center">

    <div class="col-md-5 p-lg-3 mx-auto text-center">
        <h1>Создание задачи</h1>
        <button type="button" class="btn btn-primary my-2 project-id">
            <input type="text" value="<?php echo e($projectId); ?>" hidden>
            Вернутся к проекту
        </button>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body task-id">
                <input  hidden>
                <form method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label for="project-name">Название задачи</label>
                        <input type="text" id="task-name" name="name" class="form-control" ">
                    </div>

                    <div class="form-group">
                        <label for="project-description">Краткое описание</label>
                        <textarea rows="5" id="task-description" name="description" class="form-control"></textarea>
                    </div>

                    <div class="form-group row">
                        <div class="card-body col-md-6">
                            <label for="deadline">Срок выполнения (не обязательно)</label>
                            <input type="date" name="deadline" id="task-deadline">
                        </div>
                        <div class="card-body col-md-6">
                            <label for="status">Статус задачи</label>
                            <select name="status" id="task-status">
                                <option value="1" selected>Обычный</option>
                                <option value="2" >Важно</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group row px-3">
                        <div class="mr-auto">
                            <button type="submit" id="add-task" name="change-task" class="btn btn-primary">Создать</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH G:\HTML\Progi\OpenServer\OpenServer\domains\TestWork\resources\views/task/create.blade.php ENDPATH**/ ?>
<div class="raw justify-content-center">

    <div class="col-md-5 p-lg-3 mx-auto text-center">
        <h1>Редактирование задачи</h1>
        <button type="button" class="btn btn-primary my-2 project-id">
            <input type="text" value="<?php echo e($task->project_id); ?>" hidden>
            Отменить редактирование
        </button>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body task-id">
                <input value="<?php echo e($task->id); ?>" hidden>
                <form method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label for="project-name">Название задачи</label>
                        <input type="text" id="task-name" name="name" class="form-control" value="<?php echo e($task->name); ?>">
                    </div>

                    <div class="form-group">
                        <label for="project-description">Краткое описание</label>
                        <textarea rows="5" id="task-description" name="description" class="form-control"><?php echo e($task->description); ?></textarea>
                    </div>

                    <div class="form-group row">
                        <div class="card-body col-md-6">
                            <label for="deadline">Срок выполнения (не обязательно)</label>
                            <input type="date" name="deadline" id="task-deadline"
                            <?php if( isset($task->deadline) ): ?>
                                value="<?php echo e($task->deadline); ?>"
                            <?php endif; ?>
                            >
                        </div>
                        <div class="card-body col-md-6">
                            <label for="status">Статус задачи</label>
                            <select name="status" id="task-status">
                                <option value="0" <?php if( $task->status == 0 ): ?>selected <?php endif; ?>>Выполнено</option>
                                <option value="1" <?php if( $task->status == 1 ): ?>selected <?php endif; ?>>Обычный</option>
                                <option value="2" <?php if( $task->status == 2 ): ?>selected <?php endif; ?>>Важно</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group row px-3">
                        <div class="mr-auto">
                            <button type="submit" id="task-changes-save" name="change-task" class="btn btn-primary" onclick="event.preventDefault()">Сохранить изменения</button>
                        </div>
                        <div class="">
                            <button type="submit" id="task-delete" class="btn btn-danger" onclick="event.preventDefault()">Удалить задачу</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH G:\HTML\Progi\OpenServer\OpenServer\domains\TestWork\resources\views//task/edit.blade.php ENDPATH**/ ?>
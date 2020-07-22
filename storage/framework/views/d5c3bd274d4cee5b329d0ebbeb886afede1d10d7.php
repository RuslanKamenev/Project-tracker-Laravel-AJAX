<div class="task card my-1 rounded
    <?php if( $task->status == 2 ): ?> border-danger
    <?php elseif( $task->status == 1): ?> border-warning
    <?php else: ?> border-success
    <?php endif; ?>
" style="cursor: pointer">
    <input type="text" value="<?php echo e($task->id); ?>" hidden>

    <div class="row m-2">
    <div class="card-body col-md-9">
        <b><?php echo e($task->name); ?></b>
    </div>
        <div class="col-md-3 my-2">
            <div>
                Статус задачи:
                <?php if( $task->status == 2 ): ?>
                    Важно
                <?php elseif( $task->status == 1): ?>
                    Обычный
                <?php else: ?>
                    Выполнено
                <?php endif; ?>
            </div>
            <div>
            <?php if( isset($task->deadline) && $task->status != 0): ?>
                Срок выполнения: <?php echo e($task->deadline); ?>

            <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="card-body">
        <?php echo e($task->description); ?>

    </div>

</div>
<?php /**PATH G:\HTML\Progi\OpenServer\OpenServer\domains\TestWork\resources\views/task/task.blade.php ENDPATH**/ ?>
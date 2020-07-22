<div class="card m-md-2">
    <div class="card-body project-id" style="cursor: pointer">
        <b><?php echo e($project->title); ?></b>
        <input type="text" value="<?php echo e($project->id); ?>" hidden>
    </div>
    <div class="card-body"><?php echo e($project->description); ?></div>
</div>
<?php /**PATH G:\HTML\Progi\OpenServer\OpenServer\domains\TestWork\resources\views/project/project.blade.php ENDPATH**/ ?>
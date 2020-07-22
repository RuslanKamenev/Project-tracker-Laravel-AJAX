<div class="task card my-1 rounded
    @if( $task->status == 2 ) border-danger
    @elseif( $task->status == 1) border-warning
    @else border-success
    @endif
" style="cursor: pointer">
    <input type="text" value="{{ $task->id }}" hidden>

    <div class="row m-2">
    <div class="card-body col-md-9">
        <b>{{ $task->name }}</b>
    </div>
        <div class="col-md-3 my-2">
            <div>
                Статус задачи:
                @if( $task->status == 2 )
                    Важно
                @elseif( $task->status == 1)
                    Обычный
                @else
                    Выполнено
                @endif
            </div>
            <div>
            @if( isset($task->deadline) && $task->status != 0)
                Срок выполнения: {{ $task->deadline }}
            @endif
            </div>
        </div>
    </div>

    <div class="card-body">
        {{ $task->description }}
    </div>

</div>

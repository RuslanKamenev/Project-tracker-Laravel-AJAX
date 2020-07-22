
<div class="col-md-5 p-lg-3 mx-auto text-center">
    <h1>Проект</h1>
    <h3>{{ $project->title }}</h3>
    <button id="all-projects" type="button" class="btn btn-primary my-2">
        Вернутся на страницу проектов
    </button>
</div>


@include('project.project_description')

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

@include('task.index')

@if( $tasks->total() > $tasks->count() )
    <div class="card m-md-4 paginate-links" id="tasks-paginate">
        <div class="card-body col-md-12 justify-content-center">
            {{ $tasks->links() }}
        </div>
    </div>
@endif

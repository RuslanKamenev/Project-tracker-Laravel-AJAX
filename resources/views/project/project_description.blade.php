<div class="card m-md-2" id="project-id">
    <input type="text" value="{{ $project->id }}" hidden>
    <div class="row m-md-2">
        <div class="card-body col-md-10"><b>Описание проекта:</b></div>
        <div class="card-body col-md-2 p-0">
            <button id="edit-project" type="button" class="btn btn-primary my-2">
                <input type="text" value="{{ $project->id }}" hidden>
                Редактировать проект
            </button>
        </div>
    </div>
    <div class="card-body">{{ $project->description }}</div>
</div>

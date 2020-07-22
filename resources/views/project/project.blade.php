<div class="card m-md-2">
    <div class="card-body project-id" style="cursor: pointer">
        <b>{{ $project->title }}</b>
        <input type="text" value="{{ $project->id }}" hidden>
    </div>
    <div class="card-body">{{ $project->description }}</div>
</div>

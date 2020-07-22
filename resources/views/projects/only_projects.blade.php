<div class="container" id="page-body">
    <div class="raw justify-content-center">
        <div class="col-md-5 p-lg-3 mx-auto text-center">
            <h1>Мои проекты</h1>
            <button id="add-new" type="button" class="btn btn-primary my-2">
                Добавить проект
            </button>
        </div>


        <div class="col-md-12">

            @foreach($projects as $project)
                @include('project.project')
            @endforeach

        </div>
    </div>

    @if( $projects->total() > $projects->count() )
        <div class="card m-md-4 paginate-links" id="projects-paginate">
            <div class="card-body col-md-12 justify-content-center">
                {{ $projects->links() }}
            </div>
        </div>
    @endif
</div>

<div class="raw justify-content-center">

    @include('includes.back_projects')

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="post">
                    @csrf
                    <div class="form-group">
                        <label for="project-name">Введите название проекта</label>
                        <input type="text" name="title" class="form-control" id="new-project-name" required>
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

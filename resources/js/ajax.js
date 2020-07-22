$( document ).ready(function() {

    //Токены для AJAX запросов
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //AJAX - переход н страницу добавления нового проекта
    $(document).on('click', '#add-new', function () {
            $.ajax({
                type: 'GET',
                url: '/create',
                data: {page: 'create'},
                success: function (data) {
                    $('#page-body').html(data);
                }
            });
        });

    //AJAX - добавление нового проекта в БД и переход на страницу с проектами
    $(document).on('click', '#add-project', function (e) {
        e.preventDefault();
        let title = $('#new-project-name').val();
        let description = $('#new-project-description').val();
        $.ajax({
            type: 'POST',
            url: '/',
            data: {
                title: title,
                description: description
            },
            success: function (data) {
                if (data) {
                    $.ajax({
                        type: 'GET',
                        url: '/',
                        data: {page: 'back'},
                        success: function (data) {
                            $('#page-body').html(data);
                        }
                    });
                }
            }
        });
    });


    //AJAX - переходит на страницу всех проектов
    $(document).on('click', '#all-projects', function () {
        $.ajax({
            type: 'GET',
            url: '/',
            data: {page: 'back'},
            success: function (data) {
                $('#page-body').html(data);
            }
        });
    });

    //AJAX - переход на страницу конкретного проекта
    $(document).on('click', '.project-id', function () {
        let projectId = $(this).children('input').val();
        $.ajax({
            type: 'GET',
            url: '/'+projectId,
            data: {projectId: projectId},
            success: function (data) {
                $('#page-body').html(data);
            }
        });
    });

    //AJAX - пагинация проектов и задач
    $(document).on('click', '.page-link', function (e) {
        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        if ( $('.paginate-links').attr('id') === 'tasks-paginate' ) {
            let projectId = $('#edit-project').children('input').val();
            $.ajax({
                type: 'GET',
                url: '/'+projectId,
                data: {
                    page: page,
                    projectId: projectId},
                success: function (data) {
                    $('#page-body').html(data);
                }
            });
        }
        else if ( $('.paginate-links').attr('id') === 'projects-paginate' ) {
            $.ajax({
                type: 'GET',
                url: '/',
                data: {
                    page: page
                        },
                success: function (data) {
                    $('#page-body').html(data);
                }
            });
        }
    });

    //AJAX - переход на страницу редактирования проекта
    $(document).on('click', '#edit-project', function () {
        let projectId = $(this).children('input').val();
        $.ajax({
            type: 'GET',
            url: '/'+projectId+'/edit',
            data: {project_id: projectId},
            success: function (data) {
                $('#page-body').html(data);
            }
        });
    });

    //AJAX - сохранение изменений после редактирования поста
    $(document).on('click', '#project-changes-save', function () {
        let projectId = $('.project-id').children('input').val();
        let projectTitle = $('#project-title').val();
        let projectDescription = $('#project-description').val();
        $.ajax({
            type: 'PUT',
            url: '/' + projectId,
            data: {
                id: projectId,
                title: projectTitle,
                description: projectDescription
            },
            success: function (data) {
                if (data) {
                    $.ajax({
                        type: 'GET',
                        url: '/'+projectId,
                        data: {project_id: ''},
                        success: function (data) {
                            $('#page-body').html(data);
                        }
                    })
                }
            }
        })
    });

    //AJAX - Удаление проекта
    $(document).on('click', '#project-delete', function () {
        let projectId = $('.project-id').children('input').val();
        $.ajax({
            type: 'DELETE',
            url: '/' + projectId,
            data: {id: projectId,},
            success: function (data) {
                if (data) {
                    $.ajax({
                        type: 'GET',
                        url: '/',
                        data: {page: 'back'},
                        success: function (data) {
                            $('#page-body').html(data);
                        }
                    });
                }
            }
        })
    });

    //AJAX - переход на страницу редактирования задачи
    $(document).on('click', '.task', function () {
        let taskId = $(this).children('input').val();
        $.ajax({
            type: 'GET',
            url: '/tasks/'+taskId+'/edit',
            data: {project_id: taskId},
            success: function (data) {
                $('#page-body').html(data);
            }
        });
    });

    //AJAX - добавление новой задачи в БД и переход на страницу проекта
    $(document).on('click', '#add-task', function (e) {
        e.preventDefault();
        let projectId = $('.project-id').children('input').val();
        let taskId = $('.task-id').children('input').val();
        let name = $('#task-name').val();
        let description = $('#task-description').val();
        let status = $('#task-status').val();
        let deadline = $('#task-deadline').val();
        if ( deadline === undefined )
            deadline = '(NULL)';
        $.ajax({
            type: 'POST',
            url: '/tasks',
            data: {
                project_id: projectId,
                name: name,
                description: description,
                status: status,
                deadline: deadline
            },
            success: function (data) {
                if (data) {
                    $.ajax({
                        type: 'GET',
                        url: '/'+projectId,
                        data: {project_id: ''},
                        success: function (data) {
                            $('#page-body').html(data);
                        }
                    })
                }
            }
        })
    });

    //AJAX - сохранение изменений после редактирования задачи
    $(document).on('click', '#task-changes-save', function () {
        let projectId = $('.project-id').children('input').val();
        let taskId = $('.task-id').children('input').val();
        let name = $('#task-name').val();
        let description = $('#task-description').val();
        let status = $('#task-status').val();
        let deadline = $('#task-deadline').val();
        if ( deadline === undefined )
            deadline = '';
        $.ajax({
            type: 'PUT',
            url: '/tasks/' + taskId,
            data: { id: taskId,
                    name: name,
                    description: description,
                    status: status,
                    deadline: deadline
            },
            success: function (data) {
                if (data) {
                    $.ajax({
                        type: 'GET',
                        url: '/'+projectId,
                        data: {project_id: ''},
                        success: function (data) {
                            $('#page-body').html(data);
                        }
                    })
                }
            }
        })
    });

    //AJAX - добавление новой задачи
    $(document).on('click', '#create-task', function () {
        let projectId = $('#project-id').children('input').val();
        $.ajax({
            type: 'GET',
            url: '/tasks/create',
            data: {
                page: 'create',
                projectId: projectId},
            success: function (data) {
                $('#page-body').html(data);
            }
        });
    });

    //AJAX - Удаление задачи
    $(document).on('click', '#task-delete', function () {
        let projectId = $('.project-id').children('input').val();
        let taskId = $('.task-id').children('input').val();
        $.ajax({
            type: 'DELETE',
            url: '/tasks/' + taskId,
            data: {id: taskId,},
            success: function (data) {
                if (data) {
                    $.ajax({
                        type: 'GET',
                        url: '/'+projectId,
                        data: {page: 'back'},
                        success: function (data) {
                            $('#page-body').html(data);
                        }
                    });
                }
            }
        })
    });




});

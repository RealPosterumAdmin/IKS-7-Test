<?php
session_start();
if (!isset($_SESSION['user_id'])) {
	$_SESSION['msg'] = "Вход необходим в целях безопасности.";
	header('Location: login.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8" />
        <title>Posts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
        <!-- Quill css -->
        <link href="assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />

        <link href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.0.5/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/date-1.5.2/r-3.0.2/sc-2.4.1/sb-1.7.1/sr-1.4.1/datatables.min.css" rel="stylesheet">
    </head>

    <body class="loading" data-layout="topnav" data-layout-config='{"layoutBoxed":false,"darkMode":false,"showRightSidebarOnStart": false}'>
        <!-- Begin page -->
        <div class="wrapper">
            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom topnav-navbar">
                        <div class="container-fluid">

                            <!-- LOGO -->
                            <a href="" class="topnav-logo">
                                <span class="topnav-logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="16">
                                </span>
                                <span class="topnav-logo-sm">
                                    <img src="assets/images/logo_sm_dark.png" alt="" height="16">
                                </span>
                            </a>
                            <ul class="list-unstyled topbar-menu float-end mb-0">

                                <li class="notification-list">
                                    <a class="nav-link end-bar-toggle" href="php/main.php?logout">
                                        <i class="dripicons-power noti-icon"></i>
                                    </a>
                                </li>
                            </ul>

						 </div>
					 </div>
					 <!-- end Topbar -->

                    <br>

                    <div class="content-page">
                        <div class="content">
                        <!-- Start Content-->
                            <div class="container-fluid">
<!--                    -----СОЗДАТЬ URL-----    -->
                                <div class="row for-tabs p-3" id="send">
                                    <h1>Создать пост</h1>
                                    <div class="col-12 mb-3">
                                        <label for="post_title" class="form-label">Заголовок поста</label>
                                        <input type="text" id="post_title" class="form-control">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="snow-editor" class="col form-label">Содержания поста</label>
                                        <div class="col" id="snow-editor" style="height: 300px;"></div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="categories" class="col form-label">Укажите категории</label>
                                        <select id="categories" class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">

                                        </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#createCategoryModal">Создать категорию</button>
                                    </div>

                                    <button onclick="createPost()" type="button" class="btn btn-primary">Создать</button>
                                </div>

                                <div class="card col-12">
                                    <table id="posts_table" class="table table-striped table-centered mb-0">
                                        <thead>
                                        <tr>
                                            <th>Названия</th>
                                            <th>Категории</th>
                                            <th>Создань</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>

                                <div id="createCategoryModal" class="modal fade" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="text-center mt-2 mb-4">
                                                    <a href="index.html" class="text-success">
                                                        <span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
                                                    </a>
                                                </div>

                                                <form action="#" class="ps-3 pe-3">
                                                    <div class="mb-3">
                                                    <label for="categories_for_new" class="col form-label">Укажите категории</label>
                                                    <select id="categories_for_new" class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">

                                                    </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="new_category" class="form-label">Создать категорию</label>
                                                        <input class="form-control" type="email" id="new_category" required="" placeholder="Введите название категории">
                                                    </div>
                                                    <div class="mb-3 text-center">
                                                        <button onclick="createCategory()" class="btn rounded-pill btn-primary" type="button">Создать</button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- container -->
                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Hyper - Coderthemes.com
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
              <!-- quill js -->
        <script src="assets/js/vendor/quill.min.js"></script>
        <!-- quill Init js-->
        <script src="assets/js/pages/demo.quilljs.js"></script>
        <!-- plugin js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
        <script src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.0.5/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/date-1.5.2/r-3.0.2/sc-2.4.1/sb-1.7.1/sr-1.4.1/datatables.min.js"></script>
        <script>
            var quill = new Quill('#snow-editor', {
                theme: 'snow'
            });
            function c(item){
                console.log(item);
            }
            var all_posts_table = $('#posts_table').DataTable({
                columns: [
                    {data: 'post_name', render: function(data, type, row) { return '<td><a href="view.php?id='+row.post_id+'" >'+row.post_name+'</a></td>';}},
                    {data: 'categories'},
                    {data: 'created_at'}
                    // {data: null,
                    //     render: function(data, type, row) {
                    //         return '<td class="table-action">' + '<a onclick="showDiagram(\'' + row.id + '\', \'' + row.url_name + '\')" class="action-icon" data-bs-toggle="modal" data-bs-target="#full-width-modal">' + '<i class="uil uil-chart-line"></i></a>' + '<a onclick="deleteUrl(\'' + row.id + '\', \'' + row.url_name + '\', \'' + row.full_url + '\')" class="action-icon"> <i class="mdi mdi-delete"></i></a>' + '</td>';
                    //     }

                ],
                order: [
                    [4, 'desc']
                ],
                language: {
                    processing: "Подождите...",
                    search: "Поиск:",
                    lengthMenu: "Показать _MENU_ записей",
                    info: "Показано с _START_ по _END_ из _TOTAL_ записей",
                    infoEmpty: "Показано с 0 по 0 из 0 записей",
                    infoFiltered: "(отфильтровано из _MAX_ записей)",
                    infoPostFix: "",
                    loadingRecords: "Загрузка записей...",
                    zeroRecords: "Ничего не найдено",
                    emptyTable: "Данные отсутствуют",
                    paginate: {
                        first: "Первая",
                        previous: "Предыдущая",
                        next: "Следующая",
                        last: "Последняя"
                    },
                    aria: {
                        sortAscending: ": активировать для сортировки столбца по возрастанию",
                        sortDescending: ": активировать для сортировки столбца по убыванию"
                    },
                    buttons: {
                        reload: "Обновить" // Изменение текста кнопки "Reload" на "Restart"
                    }
                }
            });
            function createPost() {
                post_title = $('#post_title').val();
                post_data = quill.root.innerHTML
                var parents = $('#categories').val();
                if (!parents || parents.length === 0) {
                    parents = [0];
                }
                if (confirm("Вы хотите создат? \n Названия:  " + post_title)) {
                    $.ajax({
                        url: 'php/main.php',
                        method: 'POST',
                        data: {
                            post_title: post_title,
                            post_data: post_data,
                            parents: parents
                        },
                        dataType: 'json',
                        success: function (responseData) {
                            console.log("Успешный ответ сервера: ", responseData);

                        },
                        error: function (xhr, status, error) {
                            console.error("Ошибка при выполнении AJAX запроса: ", status, error);
                        }
                    });
                }
            }

            function createCategory() {
                var name = $('#new_category').val();
                var parents = $('#categories_for_new').val();
                if (!parents || parents.length === 0) {
                    parents = [0];
                }
                c("cre_cat_data"+parents)
                if (confirm("Вы хотите создат? \n Названия:  " + name)) {
                    $.ajax({
                        url: 'php/main.php',
                        method: 'POST',
                        data: {
                            create_category: name,
                            parents: parents
                        },
                        dataType: 'text',
                        success: function (responseData) {
                            console.log("Успешный ответ сервера: ", responseData);

                        },
                        error: function (xhr, status, error) {
                            console.error("Ошибка при выполнении AJAX запроса: ", status, error);
                        }
                    });
                }
            }

            function get_posts() {
                $.ajax({
                    url: 'php/main.php',
                    method: 'GET',
                    data: {
                        get_all_posts: true },
                    dataType: 'json',
                    success: function(responseData) {
                        c(responseData)
                        all_posts_table.clear().draw();
                        all_posts_table.rows.add(responseData);
                        all_posts_table.columns.adjust().draw();
                    },
                    error: function(xhr, status, error) {
                        console.error("Ошибка при выполнении AJAX запроса: ", status, error);
                    }
                });
            }

            function get_category() {
                $.ajax({
                    url: 'php/main.php',
                    method: 'GET',
                    data: {
                        get_all_category: true
                    },
                    dataType: 'json',
                    success: function (responseData) {
                        $selectInput1 = $('#categories');
                        $selectInput2 = $('#categories_for_new');
                        responseData.forEach(function(item) {
                            var option = $('<option></option>').attr('value', item.id).text(item.name);
                            c(option)
                            $selectInput1.append(option.clone());
                            $selectInput2.append(option.clone());
                        });
                        console.log(responseData);
                    },
                    error: function (xhr, status, error) {
                        console.error("Ошибка при выполнении AJAX запроса: ", status, error);
                    }
                });
            }

            $('#categories_for_new').select2({
                dropdownParent: $('#createCategoryModal')
            });
            get_category()
            get_posts()
        </script>


    </body>
</html>

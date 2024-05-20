<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="<?= ROOT ?>/public/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="<?= ROOT ?>/public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="<?= ROOT ?>/public/assets/brand/favicon-32x32.png" sizes="32x32" type="image/png">

    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= ROOT ?>/public/assets/dist/css/dashboard.css" rel="stylesheet">
</head>

<body>
    <?php include('partials/header.php') ?>

    <div class="container-fluid">
        <div class="row">
            <?php include('partials/sidebar.php') ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">User</h1>
                    <a type="button" class="btn btn-info" href="<?= ROOT ?>/user/create">Create</a>
                </div>

                <h2>List</h2>

                <div class="table-responsive small">
                    <table class="table table-striped table-sm text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Introduce</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td><?= $user['id'] ?></td>
                                    <td><?= $user['name'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['introduce'] ?></td>
                                    <td>
                                        <a type="button" class="btn btn-primary me-2" href="<?= ROOT ?>/user/edit/<?= $user['id'] ?>"> Edit </a>
                                        <button type="button" class="btn btn-danger btn-delete" href="<?= ROOT ?>/user/delete/<?= $user['id'] ?>"> Delete </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <?php include('partials/script.php'); ?>
    <script>
        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            $.ajax({
                url: href,
                type: 'delete',
                success: function() {
                    toastr.success("Delete user successfully!")
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                },
            })
        })
    </script>
</body>

</html>
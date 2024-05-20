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
    <?php include('app/views/partials/header.php') ?>

    <div class="container-fluid">
        <div class="row">
            <?php include('app/views/partials/sidebar.php') ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">User</h1>
                </div>
                <h2>Edit User</h2>
                <form class="row g-3 needs-validation w-100 m-auto" action="<?= ROOT ?>/user/edit/<?= $user[0]['id'] ?>" method="post" id="edit-user">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" value="<?= $user[0]['id'] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?= $user[0]['name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= $user[0]['email'] ?>" data-email-original="<?= $user[0]['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="introduce" class="form-label">Introduce</label>
                        <textarea class="form-control" name="introduce" id="introduce" rows="3"><?= $user[0]['introduce'] ?></textarea>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" id="submit-edit-user-btn" type="submit">Edit</button>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <?php include('app/views/partials/script.php'); ?>

    <script>
        $(document).on('submit', '#edit-user', function(e) {
            e.preventDefault();
            const form = $(e.currentTarget);
            const emailOriginal = $('#email').data('email-original');
            $('.is-invalid').removeClass('is-invalid');
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize() + '&email_original=' + emailOriginal,
                dataType: 'json',
                beforeSend: () => {
                    $('#submit-edit-user-btn').attr('disabled', false);
                },
                success: function() {
                    toastr.success("Edit user successfully!")
                    setTimeout(() => {
                        window.location.reload();
                    }, 500);
                },
                error: function(error) {
                    $('#submit-edit-user-btn').attr('disabled', false);
                    if (error.status === 422) {
                        $.each(error.responseJSON.errors, (key, message) => {
                            $(`#${key}`).addClass('is-invalid')
                            toastr.error(`${message}`);
                        });
                        $(`#${Object.keys(error.responseJSON.errors)[0]}`).trigger('focus')
                    } else {
                        toastr.error(error.responseJSON.errors)
                    }
                }
            })
        })
    </script>
</body>

</html>
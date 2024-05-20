<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="<?= ROOT ?>/public/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Register</title>

    <link rel="icon" href="<?= ROOT ?>/public/assets/brand/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="<?= ROOT ?>/public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= ROOT ?>/public/assets/dist/css/login.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <?php include('app/views/partials/bdModeToggle.php'); ?>

    <main class="form-signin w-100 m-auto text-center">
        <form action="<?= ROOT ?>/signup" method="post" id="register">
            <img class="mb-3" src="<?= ROOT ?>/public/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Register</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mt-1">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <a href="<?= ROOT ?>/login">Login</a>
            <button type="submit" class="btn btn-primary w-100 py-2 mt-2" id="submit-register-button" type="submit">Register</button>
        </form>
    </main>

</body>

<?php include('app/views/partials/script.php'); ?>

<script>
    $(document).on('submit', '#register', (event) => {
        event.preventDefault();
        const form = $(event.currentTarget);
        $('.is-invalid').removeClass('is-invalid');
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            dataType: 'json',
            data: form.serialize(),
            beforeSend: () => {
                $('#submit-register-button').attr('disabled', true);
            },
            success: () => {
                toastr.success("Login successful")
                setTimeout(() => {
                    window.location.href = `<?= ROOT ?>/dashboard`;
                }, 500);
            },
            error: (error) => {
                $('#submit-register-button').attr('disabled', false);
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
        });
    });
</script>

</html>
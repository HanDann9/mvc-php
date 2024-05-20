<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="<?= ROOT ?>/public/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Create Product</title>

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
                    <h1 class="h2">Product</h1>
                </div>
                <h2>Create Product</h2>
                <form class="row g-3 needs-validation w-100 m-auto" action="<?= ROOT ?>/product/create" method="post" id="create-product">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" id="price">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" id="submit-create-product-btn" type="submit">Create</button>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <?php include('app/views/partials/script.php'); ?>

    <script>
        $(document).on('submit', '#create-product', function(e) {
            e.preventDefault();
            const form = $(e.currentTarget);
            $('.is-invalid').removeClass('is-invalid');
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                dataType: 'json',
                beforeSend: () => {
                    $('#submit-create-product-btn').attr('disabled', false);
                },
                success: function() {
                    toastr.success("Create product successfully!")
                    setTimeout(() => {
                        window.location.href = `<?= ROOT ?>/product`;
                    }, 500);
                },
                error: function(error) {
                    $('#submit-create-product-btn').attr('disabled', false);
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
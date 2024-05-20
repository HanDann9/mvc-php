<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>How to use Custom 404 in Django width Bootstrap 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link rel="icon" href="<?= ROOT ?>/public/assets/brand/favicon-32x32.png" sizes="32x32" type="image/png">
</head>

<body>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <h1 class="display-2 fw-bold">404</h1>
            <p class="fs-3">
                <span class="text-danger">Opps!</span> Page not found.
            </p>
            <p class="lead">The page you’re looking for doesn’t exist.</p>
            <a href="<?= ROOT ?>/dashboard" class="btn btn-success">Go Home</a>
        </div>
    </div>
</body>

</html>
<?php
require_once 'app/controllers/product.controller.php';
require_once 'app/controllers/auth.controller.php';
require_once 'app/controllers/dashboard.controller.php';
require_once 'app/controllers/user.controller.php';
require_once 'app/core/Router.php';
require_once 'app/middlewares/auth.php';

$router = new Router();
$authController = new AuthController();
$dashboardController = new DashboardController();
$userController = new UserController();
$productController = new ProductController();

/** auth */
$router->get('/login', [$authController, 'index']);
$router->get('/signup', [$authController, 'showFormRegister']);
$router->post('/login', [$authController, 'handle']);
$router->post('/signup', [$authController, 'handleRegister']);
$router->get('/logout', [$authController, 'logout']);

/** Dashboard */
$router->get('/dashboard', authVerify([$dashboardController, 'index']));

/** User */
$router->get('/user', authVerify([$userController, 'index']));
$router->get('/user/create', authVerify([$userController, 'create']));
$router->post('/user/create', authVerify([$userController, 'handleCreate']));
$router->get('/user/edit/:id', authVerify([$userController, 'edit']));
$router->post('/user/edit/:id', authVerify([$userController, 'handleEdit']));
$router->delete('/user/delete/:id', authVerify([$userController, 'delete']));

/** Product */
$router->get('/product', authVerify([$productController, 'index']));
$router->get('/product/create', authVerify([$productController, 'create']));
$router->post('/product/create', authVerify([$productController, 'handleCreate']));
$router->get('/product/edit/:id', authVerify([$productController, 'edit']));
$router->post('/product/edit/:id', authVerify([$productController, 'handleEdit']));
$router->delete('/product/delete/:id', authVerify([$productController, 'delete']));

/** 404 page */
$router->notFound(function () {
    http_response_code(404);
    require 'app/views/404.view.php';
});

$router->dispatch();

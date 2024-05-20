<?php
function authVerify($callback)
{
    return function () use ($callback) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user'])) {
            redirect('login');
            exit;
        }
        return call_user_func_array($callback, func_get_args());
    };
}

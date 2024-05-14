<?php

spl_autoload_register(function ($className) {
	$classPath = "../app/models/" . ucfirst($className) . ".php";

	if (file_exists($classPath)) {
		require $classPath;
	}
});

require 'config.php';
require 'functions.php';
require 'Database.php';
require 'Model.php';
require 'Controller.php';
require 'App.php';

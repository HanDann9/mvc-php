<?php


trait Controller
{
	public function view($name, $data = [])
	{
		$filename = "app/views/" . $name . ".view.php";

		if (!empty($data)) {
			extract($data);
		}

		if (file_exists($filename)) {
			require $filename;
		} else {
			require "app/views/404.view.php";
		}
	}
}

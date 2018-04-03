<?php
class Jobs
{
	// public function __construct()
	// {
	// 	// parent::__construct();
	// }

	public function login($from){
    if(empty($_SESSION["user_id"])) {
        header('location: '.str_replace($from, "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"));
    }
		return;
  }
}
?>

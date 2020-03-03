<?php
date_default_timezone_set('Asia/Dhaka');

define('ENVIRONMENT', 'production');

if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(E_ALL);
      		ini_set('display_errors', 1);
			break;

		case 'testing':
		case 'production':
			error_reporting(0);
			break;

		default:
			exit('The application environment is not set correctly.');
	}
}
	$system_path = 'system';

	list($blank, $webpath, $app) = explode("/", $_SERVER['REQUEST_URI']);
	
	if($app=='admin'){
		$app = 'admin';

	}else{
		$app = 'caretutor';
	}

	// $application_folder = 'application/'.$app;

	$application_folder = 'application/caretutor';

	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (realpath($system_path) !== FALSE)
	{
		$system_path = realpath($system_path).'/';
	}

	$system_path = rtrim($system_path, '/').'/';

	if ( ! is_dir($system_path))
	{
		exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".pathinfo(__FILE__, PATHINFO_BASENAME));
	}

	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// The PHP file extension
	// this global constant is deprecated.
	define('EXT', '.php');

	// Path to the system folder
	define('BASEPATH', str_replace("\\", "/", $system_path));

	// Path to the front controller (this file)
	define('FCPATH', str_replace(SELF, '', __FILE__));

	// Name of the "system folder"
	define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));


	// The path to the "application" folder
	if (is_dir($application_folder))
	{
		define('APPPATH', $application_folder.'/');
	}
	else
	{
		if ( ! is_dir(BASEPATH.$application_folder.'/'))
		{
			exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
		}

		define('APPPATH', BASEPATH.$application_folder.'/');
	}

require_once BASEPATH.'core/CodeIgniter.php';
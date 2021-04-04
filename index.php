<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function(){
		    
			$page = new Hcode\Page();

			$page->setTpl("index");

		}
	);

$app->get('/Admin', function(){
		    
			$page = new Hcode\Pageadmin();

			$page->setTpl("index");

		}
	);

$app->run();

 ?>
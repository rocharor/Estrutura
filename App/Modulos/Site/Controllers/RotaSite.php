<?php
namespace Rocharor\Site\Controllers;

use Silex\Application;
use Silex\ControllerProviderInterface;

class RotaSite implements ControllerProviderInterface
{
	public function connect(Application $app)
	{
		$controllers = $app['controllers_factory'];

		$controllers->get('/', function (Application $app){
			$objHome = new HomeController();
			$objHome->indexAction();
			return false;
		});

		return $controllers;
	}
}

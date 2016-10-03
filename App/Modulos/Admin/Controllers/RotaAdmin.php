<?php
namespace Rocharor\Admin\Controllers;

use Silex\Application;
use Silex\ControllerProviderInterface;

class RotaAdmin implements ControllerProviderInterface
{
	public function connect(Application $app)
	{
		$controllers = $app['controllers_factory'];

		$controllers->get('/', function (Application $app){
			$objHome = new HomeAdmController();
			$objHome->indexAction(1);
			return false;
		});

		return $controllers;
	}
}

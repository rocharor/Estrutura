<?php
namespace Rocharor\Site\Controllers;

use Rocharor\Sistema\Controller;
use Rocharor\Site\Models\HomeModel;

class HomeController extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new HomeModel;
    }

    public function indexAction()
    {
        $variaveis = [
        ];

        $this->view('home', $variaveis);
    }
}

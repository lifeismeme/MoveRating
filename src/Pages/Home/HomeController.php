<?php

namespace Pages\Home;

use Pages\Controller;
use Pages\Home\HomeService;
use Pages\Home\HomeViewModel;

class HomeController extends Controller
{
    private $homeService;
    public function __construct()
    {
        $this->homeService = new HomeService();
    }

    public function index()
    {
        $list = $this->homeService->getMovies();

        $vmodel = new HomeViewModel($list);

        return View('Home', 'index', $vmodel);
    }
}

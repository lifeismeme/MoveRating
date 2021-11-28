<?php

namespace Pages\Movie;

use Pages\Controller;

class MovieController extends Controller
{
    private MovieService $movieService;
    public function __construct()
    {
        $this->movieService = new MovieService();
    }

    public function index()
    {
        $id = $_GET['id'];
        $vmodel = $this->movieService->getMovie($id);

        return View('Movie', 'index', $vmodel);
    }

    public function add()
    {
        if (isset($_POST['name']) === false)
            return View('Movie', 'add');

        $vmodel = $this->movieService->add($_POST['name'], $_POST['description']);

        $id = $vmodel->id;
        header("Location: /Movie?id=$id");
    }

    public function rate()
    {
        $movieId = intval($_POST['id']);
        $rating = intval($_POST['rating']);

        $this->movieService->rate($movieId, $rating);

        header("Location: /Movie?id=$movieId");
    }
}

<?php

namespace Pages\Home;

use Models\Repositories\MovieRepository;

class HomeService
{
    private MovieRepository $movieRepos;
    public function __construct()
    {
        $this->movieRepos = new MovieRepository();
    }

    public function getMovies()
    {
        return $this->movieRepos->getMovies();
    }
}

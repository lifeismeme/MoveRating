<?php

namespace Pages\Movie;

use Exception;
use Infrastructure\Session;
use Models\Movie;
use Models\Repositories\MovieRepository;

class MovieService
{
    private MovieRepository $movieRepos;
    public function __construct()
    {
        $this->movieRepos = new MovieRepository();
    }

    public function getMovie(int $id): Movie
    {
        return $this->movieRepos->getMovie($id);
    }

    public function add(string $name, string $description): Movie
    {
        $name = trim($name);
        if ($name === '')
            throw new Exception('movie name is empty');

        $description = trim($description);

        return $this->movieRepos->add($name, $description);
    }

    public function rate(int $movieId, int $rating)
    {
        $session = Session::current();
        if($session->isLoggedIn() === false)
            throw new Exception('access denied');
            
        $user = $session->getCurrentUser();

        $this->movieRepos->rate($movieId, $rating, $user->id);
    }
}

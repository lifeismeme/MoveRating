<?php

namespace Pages\Home;

class HomeViewModel
{
    public $movies;

    public function __construct($movies)
    {
        $this->movies = $movies;
    }
}

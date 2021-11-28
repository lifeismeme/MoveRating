<?php

namespace Models\Repositories;

use Models\Movie;
use Models\Repositories\Repository;

class MovieRepository extends Repository
{
    public function __construct()
    {
    }

    public function getMovie(int $id)
    {
        $con = $this->getConnection();

        $sql = 'select m.*, avg(r.value) as rating from movie m'
            . ' left join `movie.rating` r on m.Id = r.movieId'
            . ' where m.id = ?'
            . ' group by m.id';

        $stmt = $con->prepare($sql);
        $stmt->execute([$id]);
        if (($r = $stmt->fetch()) !== false) {
            $movie = new Movie();
            $movie->id = $r['id'];
            $movie->name = $r['name'];
            $movie->rating = $r['rating'] ?? 0;

            return $movie;
        }
    }

    public function getMovies()
    {
        $con = $this->getConnection();

        $sql = 'select m.*, avg(r.value) as rating from movie m'
            . ' left join `movie.rating` r on m.Id = r.movieId'
            . ' group by m.id';

        $stmt = $con->prepare($sql);
        $stmt->execute();
        while (($r = $stmt->fetch()) !== false) {
            $movie = new Movie();
            $movie->id = $r['id'];
            $movie->name = $r['name'];
            $movie->description = $r['description'];
            $movie->rating = $r['rating'] ?? 0;

            yield $movie;
        }
    }

    public function add(string $name, string $description)
    {
        $con = $this->getConnection();

        $sql = 'insert into `movie`(`name`,`description`) value(?,?);';

        $stmt = $con->prepare($sql);
        $stmt->execute([$name, $description]);

        $movie = new Movie();
        $movie->id = $con->lastInsertId();
        $movie->name = $name;
        $movie->description = $description;

        return $movie;
    }

    public function rate(int $movieId, int $rating, string $userId)
    {
        $con = $this->getConnection();

        $sql = 'insert into `movie.rating`(movieId, userId, `value`) value(?,?,?)'
        . ' on duplicate key update `value` = ?;';

        $stmt = $con->prepare($sql);
        $stmt->execute([$movieId, $userId, $rating, $rating]);
    }
}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Rating</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body{
            padding: 1em;
        }
    </style>
</head>

<nav>
    <ul>
        <li class="btn"><a class="btn btn-secondary" href="/Home">Home</a></li>
        <li class="btn"><a class="btn btn-secondary" href="/Login">Logout</a></li>
    </ul>
</nav>

<body>
    <h1>Movie Rating s</h1>
    <hr>

    <h3><?= $msg ?? '' ?></h3>

    <?php require $_bodyFileName; ?>

</body>

</html>
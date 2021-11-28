<h2>Movie: xxx</h2>

<article>
    <h3><?=$vmodel->name ?></h3>
    <div>average rating: <?=round($vmodel->rating, 2) ?></div>
    <p>
        <?=$vmodel->description ?>
    </p>
</article>

<hr>

<form method="post" action="Movie/rate" autocomplete="off">
    <p>Submit your rating</p>
    <input name="id" value="<?=$vmodel->id ?>" type="hidden" />
    rate: <input name="rating" type="range" min="1" max="5" step="1" />
    <button class="btn btn-primary">Submit</button>
</form>
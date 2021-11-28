<h2>Home</h2>
<hr>

<a class="btn btn-primary" href="Movie/add">Add Movie</a>

<hr>
<section class="row">
    <?php foreach ($vmodel->movies as $m) { ?>
        <article class="col-sm-4">
            <h2>
                <a href="/Movie?id=<?= $m->id ?>">
                    <?= $m->name ?>
                </a>
            </h2>
            <p>
                rating: <input value="<?= $m->rating ?>" type="range" min="1" max="5" step=".1" disabled />
                <?= round($m->rating, 2) ?>
            </p>
            <p><?= $m->description ?></p>
        </article>
    <?php } ?>
</section>
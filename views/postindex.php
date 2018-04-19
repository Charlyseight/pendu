<div>
    <h1>
        la liste des posts
    </h1>
    <form action="index.php" method="get">
        <input type="hidden" name="a" value="create">
        <input type="hidden" name="r" value="post">
        <input type="submit" value="Créer un post">
    </form>
    <ol>
        <?php foreach( $data['data']['post'] as $post ): ?>
            <li>
                <h2>
                    <a href="index.php?a=show&r=post&id=<?= $post->id; ?>"><?= $post->title; ?></a>
                </h2>
            </li>
        <? endforeach; ?>
    </ol>
</div>

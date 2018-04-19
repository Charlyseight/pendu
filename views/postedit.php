<div>
    <h1>
        Edit
    </h1>
    <form action="index.php" method="POST">
        <label for="title">Titre</label>
        <input type="text" id="title" value="post1" name="title">
        <label for="body">Texte</label>
        <textarea name="body" id="body" cols="30" rows="10">Le texte du Post 1</textarea>
        <input type="submit" value="Mettre à jour cet article">
        <input type="hidden" name="a" value="update">
        <input type="hidden" name="r" value="post">
        <input type="hidden" name="id" value="1">
    </form>
</div>
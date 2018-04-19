
<div>
    <h1>
        create
    </h1>
    <form action="index.php" method="POST">
        <label for="title">Titre</label>
        <input type="text" id="title" value="" name="title">
        <label for="body">Texte</label>
        <textarea name="body" id="body" cols="30" rows="10">Le texte du Post 1</textarea>
        <input type="hidden" name="a" value="store">
        <input type="hidden" name="r" value="post">
        <input type="submit" value="Créer cet article">
    </form>
</div>
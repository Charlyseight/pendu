<?php

include 'model.php';

function getAllPosts()
{
    $cx = getConnectionToDb();
    $sql = 'SELECT * FROM blog.posts';
    $pst = $cx->query($sql);
    return $pst->fetchAll();

}

function getOnePost($id)
{
    $cx = getConnectionToDb();
    $sql = 'SELECT * FROM blog.posts WHERE id=:id';
    $pst = $cx->prepare($sql);
    $pst->execute([':id' => $id]);
    return $pst->fetch();
}

function storePost($title,$body)
{
    $cx = getConnectionToDb();
    $sql= 'INSERT INTO blog.posts(title,body)VALUES(:title, :body)';
    $pst = $cx -> prepare($sql);
    $pst->execute([':title'=>$_POST['title']], [':body'=>$_POST['contenu']]);
    return $pst->fetch();
}
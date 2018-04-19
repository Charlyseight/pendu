<?php

//https://laravel.com/docs/5.6/controllers#resource-controllers
// TABLEAU LARAVEL URL UP

// Index = la liste des posts/ressources en GET
function index()
{
    include 'models/post.php';
    $posts = getAllPosts();
    return [
        'view' => 'postindex.php',
        'data' => ['pageTitle' => 'liste des posts',
                    'post' => $posts
                  ]// Data est toujours un array.
    ];
}

// Create = Ca affiche le formulaire de création pour une ressource en GET
function create(){
    return [
        'view' => 'postcreate.php',
        'data' => [
        ]
    ];
}


// Elle stock la ressource  dans la base de données en POST
function store()
{
    include'models/post.php';
    $post = storePost($title,$contenu);
    return [
        'view' => 'index.php',
        'data' => [
            'pageTitle' => $post->title,
            'post' => $post
        ]
    ];
    header('Location: index.php?a=show&r=post&id=1');

}

// Affiche une ressource par rapport à un "indice" GET/photo{2}
function show()
{
    if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) return false;
    $id = $_GET['id'];
    include 'models/post.php';
    $post = getOnePost($id);
    return [
        'view' => 'postshow.php',
        'data' => [
            'pageTitle' => $post->title,
            'post' => $post
        ]
    ];
}

// Afficher le formulaire d'édition sur base d'un identifiant EN GET
function edit($id)
{
    return [
        'view' => 'postedit.php',
        'data' => []
    ];
}

// Modifier le post dans la base de données et par rapport à l'identifiant
function update($id)
{
    header('Location: index.php?a=show&r=post&id=' . $id);
}

// Supprime le post de la base de données
function destroyed($id)
{
    header('Location: index.php?a=show&r=post');
}


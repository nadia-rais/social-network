<?php 

require 'Db.php';
$db = new DB();

    require 'User.php';
   $user = new User($db);

    require 'Post.php';
    $post = new Post($db);

    require 'Searchs.php';
    $search = new Search($db);

    require 'Message.php';
    $message = new Message($db);


    require 'Reactions.php';
    $reaction = new Reactions($db);

//traitement de la déconnexion
if (isset($_POST["deco"])) {
    $user->disconnect();
}

?>
    

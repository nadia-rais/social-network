<?php $page_selected = 'profile'; 
session_start();
require 'class/Db.php';
require 'class/User.php';
$db = new DB();
$user = new User($db);

?>
<!DOCTYPE html>
<html>
<head>
    <title>social_network - profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="#">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style-profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"></script>
</head>
<body>
<header>
    <?php
    //include("includes/header.php");
    $id_user = $_SESSION['user']['id'];
    //var_dump($id_user);
    $user_details = $user->test($id_user);
    //var_dump($user_details);
    $user_followers = $user->followers($id_user);
    //var_dump($user_followers);
    $count_followers = $user->count_followers($id_user);
    //var_dump($count_followers);
    $post_users = $user->post_users($id_user);
   ?>
</header>
<main id="main-profile">
<?php //var_dump($_SESSION);?>

    <!--<div class="ovale_1"></div>-->
    <div class="ovale_2"></div>
    <div class="ovale_3"></div>

    <section id="cover-pic">
        <img id="cover" src="<?= $_SESSION['user']['cover']?>" alt="cover-picture">
        <img id="profile-mini-pic" src="<?= $_SESSION['user']['photo']?>" alt="profile-mini-pic">
        <h1 id="profile_name">@ <?= $_SESSION['user']['firstname'] ?> <?= $_SESSION['user']['lastname'] ?></h1>
        <div id="change_profile_pic"><i class="fas fa-camera"></i></div>
        <div id="change_cover_pic"><i class="fas fa-camera"></i></div>
    </section>
    
    
    <div class="container-fluid sh-100 d-flex flex-column justify-content-center index_content">
        <div class="row">
            <div class="col-4">
                <article class="infos_user_profile">
                    <span data-text="vos informations">
                        VOS INFORMATIONS &nbsp; 
                        <i class="fas fa-pen-alt"></i>
                    </span>
                    <img class="underline_wave" src="img/wave.png" alt="underline_wave">
                    <div id="user_details_part1">
                        <p id="user_localite"><i class="fas fa-map-marker-alt"></i>&nbsp;<?= $_SESSION['user']['localite']?></p>
                        <p id="user_cursus"><i class="fas fa-info-circle"></i>&nbsp;<?= $user_details['name_cursus'] ?></p>
                    </div>
                    <p id="user_bio">
                        <!--<strong>BIO</strong>-->
                        <?= $_SESSION['user']['bio'] ?>
                    </p>
                </article>
               
                <article class="infos_user_profile">
                    <span data-text="vos informations">
                        VOS RELATIONS
                    </span>
                    <img class="underline_wave" src="img/wave.png" alt="underline_wave">
                    <div id="user_followers">
                    <?php 
                        foreach ($user_followers as $followers){ ?>

                        <div class="followers">
                            <img class="followers_img" src="<?=$followers['photo'] ?>" alt="follower_mini_pic">
                            <span><?=$followers['firstname']?><?=$followers['lastname']?></span>
                        </div>

                    <?php
                        }
                    ?>
                    </div>
                </article>
            </div>
            <div class="col-8">
                <div class="profile_category">
                    <div class="active">Publications</div>
                    <div>Relations <span id="count_followers"><?= $count_followers[0] ?></span></div>
                    <div>Informations</div>
                </div>
                <div id="profile_form">
                    <img id="input-pic" src="<?= $_SESSION['user']['photo']?>" alt="input-pic">
                    <div class="input-icons"> 
                        <i class="far fa-comment-alt"></i>
                        <input class="input-field" id="share_profile" name="share_profile" type="textarea" placeholder="que voulez partager @ <?= $_SESSION['user']['firstname']?> ?"> 
                    </div> 
                    <i class="fas fa-paper-plane"></i>
                </div>
                <div class="profile_content">
                    <div id="profile_publications">
                        <div id="profile_title">
                            <img class="underline_wave" src="img/wave.png" alt="underline_wave">
                            <h2>vos publications...</h2>
                        </div>
                        <div id="profile_post">
                            <?php foreach($post_users as $post){ ?>
                                <div id="user_post">
                                <img id="input-pic" src="<?= $_SESSION['user']['photo']?>" alt="input-pic">
                                posté le : <?= $post['created_at'] ?>
                                message : <?= $post['content'] ?>
                                media : <?= $post['media'] ?>
                                </div>
        
                           <?php } ?>
                           <?php $date = new DateTime();;
                           echo date_format($date, 'd/m/Y H:i:s'); ?>
                     

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</main>
<footer>
    <?php
    include("includes/footer.php") ?>
</footer>
</body>
</html>
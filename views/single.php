<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/single.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</head>

<body>
    <header role="banner">
        <!-- inclusion du menu -->
        <div class="row justify-content-center" role="navigation">
            <nav class="navbar navbar-expand-lg navbar-dark col-sm fixed-top">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="../public/index.php"><img src="../public/images/logo.png"></a>
                <div class="collapse navbar-collapse" id="navbarToggler">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="../public/index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../public/index.php?route=blog">Nos Burgers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../public/index.php?route=about">Nos Boisson</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../public/index.php?route=contact">Contact</a>
                        </li>		
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <section role="main">
        <h1>BEST BURGERS GRILL</h1>
        <div id="publication" class="row d-flex justify-content-center mb-5">
            <!-- R??cup??ration et Construction de l'article et ses commentaires -->
            <div class="col-md-8 mt-5 mb-5">
                <article>
                    <?php foreach ($articles as $article) {   ?>
                        <!--On recupere les information de l'article-->
                        <h2><?= htmlspecialchars($article['title']); ?></h2>
                        <p class="images_blog"><img src="data:image/jpg ;base64,<?= base64_encode($article['images']);?>"><p>
                        <p><?= $article['content']; ?></p>
                        <p><?= htmlspecialchars($article['author']); ?></p>
                        <a class="btn btn-primary btn-lg active" href="tel:06 63 40 76 94">06 63 40 76 94</a>
                    <?php } ?>
                </article>
            </div>
        </div>
        <hr id="comments">
        <div id="commentContainer" class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-sm-5 col-md-4 col-lg-3 mt-5">
                    <?php include('add_comment.php'); ?>
                    <?php
                    if (isset($_SESSION['erreur_commentaire'])) {
                        echo "<span>" . $_SESSION['erreur_commentaire'] . "</span>";
                        unset($_SESSION['erreur_commentaire']);
                    }  ?>
                </div>
                <div class="col-sm-6 col-md-8 col-lg-8 mt-5">
                    <!--On recupere les information de commentaire-->
                    <h3>Commentaires</h3>
                    <hr>
                    
                    <article>
                        <?php
                            if (isset($_SESSION['signal_comment'])) {
                                echo "<span>" . $_SESSION['signal_comment'] . "</span>";
                                unset($_SESSION['signal_comment']);
                            }
                            ?>
                        <?php foreach ($comments as $comment) { ?>
                            
                            <p><strong><?= htmlspecialchars($comment['pseudo']); ?></strong> <a href="../public/index.php?route=signalcomment&articleId=<?php echo $_GET['articleId'] ?>" class="btn btn-warning btn-lg active" role="button" aria-pressed="true">Signaler</a></p>
                            <p><?= htmlspecialchars($comment['content']); ?></p>
                            <p>Post?? le <?= htmlspecialchars($comment['createdAt']); ?></p>
                        <?php }
                        $comments->closeCursor(); ?>
                    </article>
                    <hr>
                </div>
            </div>
        </div>
        </div>
    </section>
    <hr>
    <!-- inclusion du footer -->
    <footer role="contentinfo">
        <!-- Liens du site -->
        <div class="row" id="footer_links">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 d-flex justify-content-center mt-5 pt-4">
                <ul>
                    <li><a href="../public/index.php">Accueil</a></li>
                    <li><a href="../public/index.php?route=about">Nos Burgers</a></li>
                    <li><a href="../public/index.php?route=blog">Nos Boisson</a></li>
                    <li><a href="../public/index.php?route=contact">Contact</a></li>
                    <li><a href="../public/index.php">Mentions l??gales</a></li>
                </ul>
            </div>
        </div>
        <!-- R??seau sociaux -->
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 d-flex flex-column align-items-center mb-5">
                <h3 class="pl-5 h6">Suivez moi sur:</h3>
                <ul>
                    <li><a href="https://m.facebook.com/?locale=fr_FR"><img src="../public/images/facebook-icon.png" alt="icone facebook"></a></li>
                    <li class="pl-3"><a href="https://www.instagram.com/accounts/emailsignup/"><img src="../public/images/instagram-icon.png" alt="icone instagram"></a></li>
                    <li class="pl-3"><a href="https://twitter.com/?lang=fr"><img src="../public/images/Twitter-icon.png" alt="icone twitter"></a></li>
                </ul>
            </div>
        </div>
        <!-- Copyright -->
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 d-flex justify-content-center mt-4">
                <p><small>&copy; 2020 - Tout droits r??serv??s / Site r??alis?? par Abdesslam Bouzaroura </small></p>
            </div>
        </div>
    </footer>
</body>

</html>
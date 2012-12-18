<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Mes News</title>
    </head>
    <body>
        <div id="global">
            <header>
                <h1 id="titreSite"><a href="index.php">Mes News</a></h1>
                <p class="centre">Bienvenue sur mon site d'actualités.</p>
            </header>
            <nav>
                <section>
                    <h1>Administration</h1>
                    <ul>
                        <li><a href="news.php">Ajouter une news</a></li>
                    </ul>
                </section>
            </nav>
            <div id="contenu">
                <?php
                $cnx = mysql_connect('localhost', 'root', '') or die('Connexion impossible');
                mysql_select_db('mesnews', $cnx);
                mysql_query('set names utf8');
                $resultats = mysql_query('select * from T_NEWS N JOIN T_CATEGORIE C ON N.CAT_ID=C.CAT_ID order by NEWS_ID desc', $cnx);
                $ligne = mysql_fetch_assoc($resultats);
                while ($ligne) {
                    ?>
                    <article>
                        <header>
                            <h1 class="titreNews"><?php echo $ligne['NEWS_TITRE'] ?></h1>
                            <time><?php echo $ligne['NEWS_DATE'] ?></time>
                        </header>
                        <p><?php echo $ligne['NEWS_CONTENU'] ?></p>
                        <footer class="categorie">Catégorie : <?php echo $ligne['CAT_NOM'] ?></footer>
                    </article>
                    <hr />
                    <?php
                    $ligne = mysql_fetch_assoc($resultats);
                }
                mysql_close($cnx);
                ?>
            </div> <!-- #contenu -->
            <footer id="piedSite">
                Site réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
    </body>
</html>


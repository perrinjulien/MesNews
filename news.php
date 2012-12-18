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
                        <li><a href="todo">Ajouter une news</a></li>
                    </ul>
                </section>
            </nav>
            <div id="contenu">
                <form method="post" action="\..\Modele\modele_news_ajout.php">
                    <textarea class="txt" name="titre" rows="2" placeholder="Le titre de la news" required></textarea><br />
                    <textarea class="txt" name="contenu" rows="4" placeholder="Le contenu de la news" required></textarea><br />
                    <input name="categorie" type="text" placeholder="La catégorie de la news" required /><br />
                    <p class="centre"><input id="btnAjouter" type="submit" value="Ajouter" /></p>
                </form>
            </div> <!-- #contenu -->
            <footer id="piedSite">
                Site réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
    </body>
</html>


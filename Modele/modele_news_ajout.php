<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <?php
        // addslashes ajoute des \ devant les ', les "" et les \
        $titre = addslashes($_POST['titre']);
        $contenu = addslashes($_POST['contenu']);
        $categorie = $_POST['categorie'];
        
        $cnx = mysql_connect('localhost', 'root', '') or die('Connexion impossible');
        mysql_select_db('mesnews', $cnx);
        mysql_query('set names utf8');
        
        // Récupération de l'id de la catégorie choisie
        $resultats = mysql_query("select CAT_ID from T_CATEGORIE where CAT_NOM='$categorie'", $cnx);
        $ligne = mysql_fetch_assoc($resultats);
        $idCategorie = $ligne['CAT_ID'];
        
        // Insertion de la news en BD
        $date = date(DATE_W3C);
        $sql = "insert into T_NEWS(NEWS_DATE, NEWS_TITRE, NEWS_CONTENU, CAT_ID) values ( 
                '$date', '$titre', '$contenu', $idCategorie)";
        mysql_query($sql);
        mysql_close($cnx);
        
        // Retour à la page principale
        header('Location: index.php');
        ?>
    </body>
</html>
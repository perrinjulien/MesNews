<?php $titre = 'Mon Blog' ?>

<?php ob_start() ?>
<?php foreach ($newss as $news): ?>
    <article>
        <header>
            <h1 class="titreNews">
                <a href="<?= $lienNews . $news['NEWS_ID'] ?>">
                    <?= $news['NEWS_TITRE'] ?>
                </a>
            </h1>
            <time><?= $news['NEWS_DATE'] ?></time>
        </header>
        <p><?= $news['NEWS_CONTENU'] ?></p>
        
        <footer class="commentaire"><?= $news['NB_COM'] ?> commentaire(s)</footer>
        
    </article>
    <hr />
<?php endforeach; ?>
<?php $contenu = ob_get_clean() ?>

<?php include 'gabarit.php' ?>

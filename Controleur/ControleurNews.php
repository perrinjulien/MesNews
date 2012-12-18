<?php

require_once 'Modele/ModeleNews.php';
require_once 'Modele/modele_news_ajout.php';

require_once 'Controleur/Controleur.php';

/**
 * Contrôleur des actions liées aux billets
 *
 * @author PERRIN
 */
class ControleurBillet extends Controleur
{
    private $modeleNews;
    //private $modeleCommentaire;
    
    public function __construct()
    {
        $this->modeleNews = new ModeleNews();
        //$this->modeleCommentaire = new ModeleCommentaire();
    }
    
    public function listerBillets()
    {
        // Solution simple au problème du comptage des commentaires par billet : cf ModeleBillet
        $billets = $this->modeleNews->lireTout();
        
        /*
        // Solution complexe au problème du comptage des commentaires par billet
        // Récupération de la liste des billets sous la forme d'un objet PDOStatement
        $resultatsBillets = $this->modeleBillet->lireTout();
        // Accès aux lignes de résultats (les billets du blog) sous la forme d'un tableau
        $billets = $resultatsBillets->fetchAll();
        // Ajout du nombre de commentaires pour chaque billet du blog
        // Le symbole &, indispensable, indique un passage par référence
        foreach ($billets as &$billet) {
            $resultatsCom = $this->modeleCommentaire->compter($billet['BIL_ID']);
            $billet['NB_COM'] = $resultatsCom['NB_COM'];
        }*/
        
        $lienBillet = "index.php?action=afficherNews&id=";
        $this->genererVue('listeNewss', 
                array('newss' => $newss, 'lienNews' => $lienNews));
    }

    public function afficherNews($id)
    {
        $news = $this->modeleNews->lireUnSeul($id);
        $commentaires = $this->modeleCommentaire->lire($id);
        $this->genererVue('detailsNews', 
                array('news' => $news, 'commentaires' => $commentaires));
    }

    public function ajouterNews($auteur, $commentaire, $idNews) {
        $this->modeleNews->ajouter($auteur, $commentaire, $idNews);
        $this->afficherNews($idNews);
    }
}


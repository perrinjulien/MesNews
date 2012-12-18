<?php

require_once 'Modele/Modele.php';

/**
 * Classe modélisant un billet de blog
 *
 * @author Baptiste
 */
class ModeleNews extends Modele
{

    public function lireTout()
    {
        // Solution simple au problème du comptage des billets : une requête avec un LEFT JOIN et un GROUP BY
        $sql = 'select N.NEWS_ID, NEWS_DATE, NEWS_TITRE, NEWS_CONTENU, COUNT(NEWS_ID) AS NB_NEWS from T_NEWS N LEFT JOIN T_CATEGORIE C ON N.NEWS_ID=C.NEWS_ID group by N.NEWS_ID order by N.NEWS_ID desc';
        
        // Solution complexe : cf ControleurBillet
        //$sql = 'select * from T_NEWS order by NEWS_ID desc';
        
        return $this->executerLecture($sql);
    }

    public function lireUnSeul($id)
    {
        return $this->executerLecture('select * from T_NEWS where NEWS_ID=' . $id, true);
    }

}

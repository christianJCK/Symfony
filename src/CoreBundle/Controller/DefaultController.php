<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $listAdverts = array(
            array(
                'title'     => 'Recherche développeur Symfony',
                'id'        => 1,
                'author'    => 'Alexandre',
                'content'   => 'Nous recherchons un développeur Symfony débutant sur Lyon.',
                'date'      => new \DateTime()),
            array(
                'title'     => 'Mission de Webmaster',
                'id'        => 2,
                'author'    => 'Hugo',
                'content'   => 'Nous proposons un poste pour webmaster. Bla bLa',
                'date'      => new \DateTime()),
            array(
                'title'     => 'Offre de stage webdesigner',
                'id'        => 3,
                'author'    => 'Mathieu',
                'content'   => 'Nous proposons un poste pour webdesigner',
                'date'   => new \DateTime()),

            );

        return $this->render('CoreBundle:Default:index.html.twig', array(
            'listAdverts' => $listAdverts,
        ));
    }
}

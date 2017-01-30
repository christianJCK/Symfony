<?php
/**
 * Created by PhpStorm.
 * User: apprenti-thinkpad-t430s
 * Date: 17/01/17
 * Time: 21:52
 */

namespace OC\PlatformBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class AdvertController extends Controller
{

    public function indexAction($page)
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
                'content'   => 'Nous proposons un poste pour wedmaster. BlaBla',
                'date'      => new \DateTime()),
            array(
                'title'   => 'Offre de stage webdesigner',
                'id'      => 3,
                'author'  => 'Mathieu',
                'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
                'date'    => new \Datetime()),
        );

        return $this->render('OCPlatformBundle:Advert:index.html.twig', array(
            'listAdverts' => $listAdverts
        ));
    }


    public function viewAction($id)
    {
        $advert = array(
            'title'     => 'Recherche développeur Symfony 2',
            'id'        => $id,
            'author'    => 'Alexandre',
            'content'   => 'Nous recherchons un développeur Symfony2 débutant sur Lyon.',
            'date'      => new \DateTime()
        );
        return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
            'advert' => $advert
        ));
    }

    public function addAction(Request $request)
    {

        $antispam = $this->get('oc_platform.antispam');

        $text = '...';
        if($antispam->isSpam($text)) {
            throw new \Exception('Votre message a été détécté comme spam !');
        }

    }

    public function editAction($id, Request $request)
    {

        if($request->isMethod('POST')) {
            $this->addFlash('notice', 'Annonce bien modifiée');
            return $this->redirectToRoute('oc_platform_view', array(
                'id' => 5,
            ));
        }

        $advert = array(
            'title' => 'Recherche développeur Symfony',
            'id'    => $id,
            'author'=> 'Alexandre',
            'content'=> 'Nous recherchons un développeur Symfony débutant sur Lyon',
            'date'  => new \DateTime(),
        );

        return $this->render('OCPlatformBundle:Advert:edit.html.twig', array(
            'advert' => $advert
        ));
    }

    public function deleteAction($id)
    {
        return $this->render('OCPlatformBundle:Advert:delete.html.twig');
    }

    public function viewSlugAction($slug, $year, $_format)
    {
        return new Response(
            "on pourrait afficher l'annonce correspondant au slug " . $slug . ", créée en " . $year . " et au format " . $_format . "."
        );
    }

    public function menuAction($limit)
    {
        $listAdverts = array(
            array('id' => 2, 'title' => 'Recherche Dev Symfony'),
            array('id' => 5, 'title' => 'Mission de Webmaster'),
            array('id' => 9, 'title' => 'Offre de stage en de Webdesigner'),
        );

        return $this->render('OCPlatformBundle:Advert:menu.html.twig', array(
            'listAdverts' => $listAdverts
        ));
    }

    public function byeAction()
    {
        $content = $this->get('templating')->render('OCPlatformBundle:Advert:bye.html.twig', array(
            "pays" => "France",
            "origine" => "Alsacienne",
        ));

        return new Response($content);
    }
}

/*
if($request->isMethod('POST')) {
    $this->addFlash('notice', 'Annonce bien enregistrée.');
    return $this->redirectToRoute('oc_platform_view', array(
        'id' => 5
    ));

}
return $this->render('OCPlatformBundle:Advert:add.html.twig');
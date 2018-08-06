<?php

namespace DW\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CoreController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dwarves = $em->getRepository('DWCoreBundle:Dwarf')->findAll();
        $towns = $em->getRepository('DWCoreBundle:Town')->findAll();
        $gangs = $em->getRepository('DWCoreBundle:Gang')->findAll();
        $taverns = $em->getRepository('DWCoreBundle:Tavern')->findAll();

        return $this->render('DWCoreBundle:Core:index.html.twig',
            [
                'dwarves'   => $dwarves,
                'towns'     => $towns,
                'gangs'     => $gangs,
                'taverns'     => $taverns
            ]);
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function dwarfAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $dwarf = $em->getRepository('DWCoreBundle:Dwarf')->find($id);

        if ($dwarf === null) {
            throw new NotFoundHttpException("Ce nain est inconnu de nos registres.");
        }

        return $this->render('DWCoreBundle:Core:dwarf.html.twig', ['dwarf' => $dwarf]);
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function townAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $town = $em->getRepository('DWCoreBundle:Town')->find($id);

        if ($town === null) {
            throw new NotFoundHttpException("Cette ville n'apparaît pas sur nos cartes.");
        }

        $dwarves = $em->getRepository('DWCoreBundle:Dwarf')->findBy(['town' => $town]);

        $taverns = $em->getRepository('DWCoreBundle:Tavern')->findBy(['town' => $town]);

        $startTunnels = $em->getRepository('DWCoreBundle:Tunnel')->findBy(['startTown' => $town->getId()]);

        $endTunnels = $em->getRepository('DWCoreBundle:Tunnel')->findBy(['endTown' => $town->getId()]);

        return $this->render('DWCoreBundle:Core:town.html.twig',
            [
                'town' => $town,
                'dwarves' => $dwarves,
                'taverns' => $taverns,
                'startTunnels' => $startTunnels,
                'endTunnels' => $endTunnels
            ]);
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function gangAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $gang = $em->getRepository('DWCoreBundle:Gang')->find($id);

        if ($gang  === null) {
            throw new NotFoundHttpException("Nous n'avons pas de traces de ce groupe.");
        }

        $taverns = $em->getRepository('DWCoreBundle:Tavern')->findAll();

        foreach ( $taverns as $key => $tavern ) // Parcourir les tavernes à recommander et retirer "Au pire accueil"
        {
            if ($tavern->getName() === 'Au pire accueil') {
                unset($taverns[$key]);
                break;
            }
        }

        $dwarves = $em->getRepository('DWCoreBundle:Dwarf')->findBy(['gang' => $gang]);

        return $this->render('DWCoreBundle:Core:gang.html.twig',
            [
                'gang' => $gang,
                'dwarves' => $dwarves,
                'taverns' => $taverns
            ]);
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function tavernAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $tavern = $em->getRepository('DWCoreBundle:Tavern')->find($id);

        if ($tavern  === null) {
            throw new NotFoundHttpException("Cette taverne à probablement fait faillite.");
        }

        if ($tavern->getBlonde()) $beers[] = 'blonde'; // Créer un tableau des bières disponibles pour un affichage simplifié et propre.
        if ($tavern->getBrown()) $beers[] = 'brune';
        if ($tavern->getAmber()) $beers[] = 'rousse';

        $gangs = $em->getRepository('DWCoreBundle:Gang')->findBy(['tavern' => $tavern]);

        $dwarfCount = 0;

        foreach ( $gangs as $gang ) // Compter le nombre de nains présent dans une taverne (plusieurs groupes possible)
        {
            $dwarfCount += $this->getDoctrine()
                                 ->getRepository('DWCoreBundle:Dwarf')
                                 ->countDwarves($gang->getId()); // Méthode dans le repository
        }

        return $this->render('DWCoreBundle:Core:tavern.html.twig',
            [
                'tavern' => $tavern,
                'dwarfCount' => $dwarfCount,
                'beers' => $beers
            ]);
    }
}

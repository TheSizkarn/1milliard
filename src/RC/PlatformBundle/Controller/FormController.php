<?php

namespace RC\PlatformBundle\Controller;

use RC\PlatformBundle\Entity\Movie;
use RC\PlatformBundle\Form\MovieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class FormController
 * @package RC\PlatformBundle\Controller
 */
class FormController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="rc_platform_homepage", methods={"POST", "GET"})
     */
    public function addAction(Request $request)
    {
        $movies = new Movie();
        $form = $this->createForm(MovieType::class, $movies, ['action' =>$this->get('router')->generate('rc_platform_homepage')]);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($movies);
                $em->flush();
                return $this->redirectToRoute("rc_platform_homepage");
            }
        }

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('RCPlatformBundle:Movie');

        $listMovies = $repository->findAll();
        $nbMovies = $repository->countMovies();

        return $this->render('@RCPlatform/index.html.twig', array(
            'form' => $form->createView(),
            'listMovies' => $listMovies,
            'nbMovies' => $nbMovies,
        ));
    }

    /**
     * @param $id
     * @Route("/{id}", name="rc_platform_view", methods={"POST", "GET"})
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function viewAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $movie = $em->getRepository('RCPlatformBundle:Movie')->find($id);

        return $this->render('@RCPlatform/view.html.twig', array(
            'movie' => $movie,
        ));

    }
}

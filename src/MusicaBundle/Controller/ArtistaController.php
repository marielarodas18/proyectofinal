<?php

namespace MusicaBundle\Controller;

use MusicaBundle\Entity\Artista;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Artistum controller.
 *
 */
class ArtistaController extends Controller
{
    /**
     * Lists all artistum entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $artistas = $em->getRepository('MusicaBundle:Artista')->findAll();

        return $this->render('artista/index.html.twig', array(
            'artistas' => $artistas,
        ));
    }

    /**
     * Creates a new artistum entity.
     *
     */
    public function newAction(Request $request)
    {
        $artistum = new Artista();
        $form = $this->createForm('MusicaBundle\Form\ArtistaType', $artistum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($artistum);
            $em->flush();

            return $this->redirectToRoute('artista_show', array('id' => $artistum->getId()));
        }

        return $this->render('artista/new.html.twig', array(
            'artistum' => $artistum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a artistum entity.
     *
     */
    public function showAction(Artista $artistum)
    {
        $deleteForm = $this->createDeleteForm($artistum);

        return $this->render('artista/show.html.twig', array(
            'artistum' => $artistum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing artistum entity.
     *
     */
    public function editAction(Request $request, Artista $artistum)
    {
        $deleteForm = $this->createDeleteForm($artistum);
        $editForm = $this->createForm('MusicaBundle\Form\ArtistaType', $artistum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('artista_edit', array('id' => $artistum->getId()));
        }

        return $this->render('artista/edit.html.twig', array(
            'artistum' => $artistum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a artistum entity.
     *
     */
    public function deleteAction(Request $request, Artista $artistum)
    {
        $form = $this->createDeleteForm($artistum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($artistum);
            $em->flush();
        }

        return $this->redirectToRoute('artista_index');
    }

    /**
     * Creates a form to delete a artistum entity.
     *
     * @param Artista $artistum The artistum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Artista $artistum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('artista_delete', array('id' => $artistum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

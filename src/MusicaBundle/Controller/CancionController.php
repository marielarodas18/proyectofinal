<?php

namespace MusicaBundle\Controller;

use MusicaBundle\Entity\Cancion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Cancion controller.
 *
 */
class CancionController extends Controller
{
    /**
     * Lists all cancion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cancions = $em->getRepository('MusicaBundle:Cancion')->findAll();

        return $this->render('cancion/index.html.twig', array(
            'cancions' => $cancions,
        ));
    }

    /**
     * Creates a new cancion entity.
     *
     */
    public function newAction(Request $request)
    {
        $cancion = new Cancion();
        $form = $this->createForm('MusicaBundle\Form\CancionType', $cancion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cancion);
            $em->flush();

            return $this->redirectToRoute('cancion_show', array('id' => $cancion->getId()));
        }

        return $this->render('cancion/new.html.twig', array(
            'cancion' => $cancion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cancion entity.
     *
     */
    public function showAction(Cancion $cancion)
    {
        $deleteForm = $this->createDeleteForm($cancion);

        return $this->render('cancion/show.html.twig', array(
            'cancion' => $cancion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cancion entity.
     *
     */
    public function editAction(Request $request, Cancion $cancion)
    {
        $deleteForm = $this->createDeleteForm($cancion);
        $editForm = $this->createForm('MusicaBundle\Form\CancionType', $cancion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cancion_edit', array('id' => $cancion->getId()));
        }

        return $this->render('cancion/edit.html.twig', array(
            'cancion' => $cancion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cancion entity.
     *
     */
    public function deleteAction(Request $request, Cancion $cancion)
    {
        $form = $this->createDeleteForm($cancion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cancion);
            $em->flush();
        }

        return $this->redirectToRoute('cancion_index');
    }

    /**
     * Creates a form to delete a cancion entity.
     *
     * @param Cancion $cancion The cancion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cancion $cancion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cancion_delete', array('id' => $cancion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

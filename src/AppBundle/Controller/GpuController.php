<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Gpu;
use AppBundle\Form\GpuType;

/**
 * Gpu controller.
 *
 * @Route("/gpu")
 */
class GpuController extends Controller
{
    /**
     * Lists all Gpu entities.
     *
     * @Route("/", name="gpu_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $gpus = $em->getRepository('AppBundle:Gpu')->findAll();

        return $this->render('gpu/index.html.twig', array(
            'gpus' => $gpus,
        ));
    }

    /**
     * Creates a new Gpu entity.
     *
     * @Route("/new", name="gpu_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $gpu = new Gpu();
        $form = $this->createForm('AppBundle\Form\GpuType', $gpu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gpu);
            $em->flush();

            return $this->redirectToRoute('gpu_show', array('id' => $gpu->getId()));
        }

        return $this->render('gpu/new.html.twig', array(
            'gpu' => $gpu,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Gpu entity.
     *
     * @Route("/{id}", name="gpu_show")
     * @Method("GET")
     */
    public function showAction(Gpu $gpu)
    {
        $deleteForm = $this->createDeleteForm($gpu);

        return $this->render('gpu/show.html.twig', array(
            'gpu' => $gpu,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Gpu entity.
     *
     * @Route("/{id}/edit", name="gpu_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Gpu $gpu)
    {
        $deleteForm = $this->createDeleteForm($gpu);
        $editForm = $this->createForm('AppBundle\Form\GpuType', $gpu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gpu);
            $em->flush();

            return $this->redirectToRoute('gpu_edit', array('id' => $gpu->getId()));
        }

        return $this->render('gpu/edit.html.twig', array(
            'gpu' => $gpu,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Gpu entity.
     *
     * @Route("/{id}", name="gpu_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Gpu $gpu)
    {
        $form = $this->createDeleteForm($gpu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gpu);
            $em->flush();
        }

        return $this->redirectToRoute('gpu_index');
    }

    /**
     * Creates a form to delete a Gpu entity.
     *
     * @param Gpu $gpu The Gpu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Gpu $gpu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gpu_delete', array('id' => $gpu->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

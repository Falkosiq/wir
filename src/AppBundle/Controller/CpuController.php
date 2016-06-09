<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Cpu;
use AppBundle\Form\CpuType;

/**
 * Cpu controller.
 *
 * @Route("/cpu")
 */
class CpuController extends Controller
{
    /**
     * Lists all Cpu entities.
     *
     * @Route("/", name="cpu_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cpus = $em->getRepository('AppBundle:Cpu')->findAll();

        return $this->render('cpu/index.html.twig', array(
            'cpus' => $cpus,
        ));
    }

    /**
     * Creates a new Cpu entity.
     *
     * @Route("/new", name="cpu_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cpu = new Cpu();
        $form = $this->createForm('AppBundle\Form\CpuType', $cpu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cpu);
            $em->flush();

            return $this->redirectToRoute('cpu_show', array('id' => $cpu->getId()));
        }

        return $this->render('cpu/new.html.twig', array(
            'cpu' => $cpu,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cpu entity.
     *
     * @Route("/{id}", name="cpu_show")
     * @Method("GET")
     */
    public function showAction(Cpu $cpu)
    {
        $deleteForm = $this->createDeleteForm($cpu);

        return $this->render('cpu/show.html.twig', array(
            'cpu' => $cpu,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cpu entity.
     *
     * @Route("/{id}/edit", name="cpu_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cpu $cpu)
    {
        $deleteForm = $this->createDeleteForm($cpu);
        $editForm = $this->createForm('AppBundle\Form\CpuType', $cpu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cpu);
            $em->flush();

            return $this->redirectToRoute('cpu_edit', array('id' => $cpu->getId()));
        }

        return $this->render('cpu/edit.html.twig', array(
            'cpu' => $cpu,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Cpu entity.
     *
     * @Route("/{id}", name="cpu_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cpu $cpu)
    {
        $form = $this->createDeleteForm($cpu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cpu);
            $em->flush();
        }

        return $this->redirectToRoute('cpu_index');
    }

    /**
     * Creates a form to delete a Cpu entity.
     *
     * @param Cpu $cpu The Cpu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cpu $cpu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cpu_delete', array('id' => $cpu->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

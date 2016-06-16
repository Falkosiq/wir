<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Pc;
use AppBundle\Form\PcType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Pc controller.
 *
 * @Route("/pc")
 */
class PcController extends Controller
{
    /**
     * Lists all Pc entities.
     *
     * @Route("/", name="pc_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pcs = $em->getRepository('AppBundle:Pc')->findAll();

        return $this->render('pc/index.html.twig', array(
            'pcs' => $pcs,
        ));
    }

    /**
     * Creates a new Pc entity.
     *
     * @Route("/new", name="pc_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pc = new Pc();
        $form = $this->createForm('AppBundle\Form\PcType', $pc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pc);
            $this->getUser()->setPc($pc);
            $em->flush();
      
            return $this->redirectToRoute('pc_show', array('id' => $pc->getId()));
        }

        return $this->render('pc/new.html.twig', array(
            'pc' => $pc,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Pc entity.
     *
     * @Route("/{id}", name="pc_show")
     * @Method("GET")
     */
    public function showAction(Pc $pc)
    {
        $deleteForm = $this->createDeleteForm($pc);

        return $this->render('pc/show.html.twig', array(
            'pc' => $pc,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Pc entity.
     *
     * @Route("/{id}/edit", name="pc_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Pc $pc)
    {
        $deleteForm = $this->createDeleteForm($pc);
        $editForm = $this->createForm('AppBundle\Form\PcType', $pc);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pc);
            $em->flush();

            return $this->redirectToRoute('pc_edit', array('id' => $pc->getId()));
        }

        return $this->render('pc/edit.html.twig', array(
            'pc' => $pc,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Pc entity.
     *
     * @Route("/{id}", name="pc_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Pc $pc)
    {
        $form = $this->createDeleteForm($pc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pc);
            $em->flush();
        }

        return $this->redirectToRoute('pc_index');
    }

    /**
     * Creates a form to delete a Pc entity.
     *
     * @param Pc $pc The Pc entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pc $pc)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pc_delete', array('id' => $pc->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    /**
     * @Route("/mypc/", name="pc_my")
     */
    public function mypcAction()
    {
        $mypc = $this->getUser()->getPc();
        dump($mypc);
        return $this->render('pc/mypc.html.twig', array(
            'mypc' => $mypc,
        ));
    }
}

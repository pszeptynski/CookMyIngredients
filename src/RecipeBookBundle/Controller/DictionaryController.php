<?php

namespace RecipeBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use RecipeBookBundle\Entity\Dictionary;

/**
 * @Route("/dict")
 */
class DictionaryController extends Controller {

    /**
     * @Route("/new", name="newItem")
     * @Template()
     */
    public function newAction(Request $request) {
        $task = new Dictionary();
        $form = $this->createFormBuilder($task)
                ->add('name', 'text')
                ->add('measurementUnit', 'text')
                ->add('save', 'submit')
                ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();
        }
        return array('create_form' => $form->createView());
    }

    /**
     * @Route("/update/{id}", name="updateItem")
     * @Template()
     */
    public function updateAction(Request $request, $id) {
        $repo = $this->getDoctrine()->getRepository('RecipeBookBundle:Dictionary');
        $task = $repo->find($id);

        $form = $this->createFormBuilder($task)
                ->add('name', 'text')
                ->add('measurementUnit', 'text')
                ->add('save', 'submit')
                ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();
        }
        return array('update_form' => $form->createView());
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function deleteAction(Request $request, $id) {
        $repo = $this->getDoctrine()->getRepository('RecipeBookBundle:Dictionary');
        $task = $repo->find($id);

        if (!$task) {
            throw $this->createNotFoundException('Unable to find Dictionary entity.');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($task);
        $em->flush();
        return $this->redirect($this->generateUrl('showAll'));
    }

    /**
     * @Route("/showItem/{id}", name="showItem")
     * @Template()
     */
    public function showItemAction($id) {
        $repo = $this->getDoctrine()->getRepository('RecipeBookBundle:Dictionary');
        $DictItem = $repo->find($id);
        return ['item' => $DictItem];
    }

    /**
     * @Route("/showAll", name="showAll")
     * @Template()
     */
    public function showallAction() {
        $repo = $this->getDoctrine()->getRepository('RecipeBookBundle:Dictionary');
        $allDictItems = $repo->findAll();
        return ['dictionary' => $allDictItems];
    }

}

<?php

namespace RecipeBookBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use RecipeBookBundle\Entity\SecondaryIngredient;
use RecipeBookBundle\Form\SecondaryIngredientType;

/**
 * SecondaryIngredient controller.
 *
 * @Route("/sec_ingredient")
 */
class SecondaryIngredientController extends Controller
{

    /**
     * Lists all SecondaryIngredient entities.
     *
     * @Route("/", name="secondaryingredient")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RecipeBookBundle:SecondaryIngredient')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new SecondaryIngredient entity.
     *
     * @Route("/", name="secondaryingredient_create")
     * @Method("POST")
     * @Template("RecipeBookBundle:SecondaryIngredient:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new SecondaryIngredient();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('secondaryingredient_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a SecondaryIngredient entity.
     *
     * @param SecondaryIngredient $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SecondaryIngredient $entity)
    {
        $form = $this->createForm(new SecondaryIngredientType(), $entity, array(
            'action' => $this->generateUrl('secondaryingredient_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SecondaryIngredient entity.
     *
     * @Route("/new", name="secondaryingredient_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new SecondaryIngredient();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a SecondaryIngredient entity.
     *
     * @Route("/{id}", name="secondaryingredient_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecipeBookBundle:SecondaryIngredient')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SecondaryIngredient entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing SecondaryIngredient entity.
     *
     * @Route("/{id}/edit", name="secondaryingredient_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecipeBookBundle:SecondaryIngredient')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SecondaryIngredient entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a SecondaryIngredient entity.
    *
    * @param SecondaryIngredient $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SecondaryIngredient $entity)
    {
        $form = $this->createForm(new SecondaryIngredientType(), $entity, array(
            'action' => $this->generateUrl('secondaryingredient_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SecondaryIngredient entity.
     *
     * @Route("/{id}", name="secondaryingredient_update")
     * @Method("PUT")
     * @Template("RecipeBookBundle:SecondaryIngredient:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecipeBookBundle:SecondaryIngredient')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SecondaryIngredient entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('secondaryingredient_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a SecondaryIngredient entity.
     *
     * @Route("/{id}", name="secondaryingredient_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RecipeBookBundle:SecondaryIngredient')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SecondaryIngredient entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('secondaryingredient'));
    }

    /**
     * Creates a form to delete a SecondaryIngredient entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('secondaryingredient_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

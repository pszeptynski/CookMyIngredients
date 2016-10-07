<?php

namespace RecipeBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction($name) {
//        return array('name' => $name);
        // pobieranie zalogowanego usera
//        $user = new User();
//        $loggedUser = $user->getUser(); //getUser wbudowane w Sf
//        $content = $this->renderView('AcmeReadBundle:Show:index.html.twig',$product);
//    return new Response($content);

        $em = $this->getDoctrine()->getManager();
        $id = 3;
        $entity = $em->getRepository('RecipeBookBundle:Recipe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Recipe entity.');
        }
        return array(
            'entity' => $entity,
        );
    }

}

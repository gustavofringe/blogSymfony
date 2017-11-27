<?php

namespace Blog\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('BlogBlogBundle:Default:index.html.twig');
    }

    /**
     * @Route("/articles/{id}",
     *      name="blog_view",
     *     defaults={"id"=1},
     *     requirements={"id":"\d+"}
     * )
     * @param $id
     */
    public function viewAction($id){
        return $this->render('BlogBlogBundle:Default:view.html.twig',compact('id'));
    }
}

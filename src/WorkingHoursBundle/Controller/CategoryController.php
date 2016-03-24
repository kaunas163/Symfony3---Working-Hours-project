<?php

namespace WorkingHoursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    public function indexAction()
    {
        return $this->render('WorkingHoursBundle:Category:index.html.twig');
    }
    
    public function createAction()
    {
        return $this->render('WorkingHoursBundle:Category:create.html.twig');
    }
    
    public function editAction($id)
    {
        return $this->render('WorkingHoursBundle:Category:edit.html.twig');
    }
    
    public function deleteAction($id)
    {
        return $this->render('WorkingHoursBundle:Category:delete.html.twig');
    }
}

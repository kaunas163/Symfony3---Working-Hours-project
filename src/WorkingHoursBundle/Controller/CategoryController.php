<?php

namespace WorkingHoursBundle\Controller;

use WorkingHoursBundle\Entity\categories;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CategoryController extends Controller
{
    public function indexAction()
    {
        $categories = $this->getDoctrine()->getRepository('WorkingHoursBundle:categories')->findAll();
        
        return $this->render('WorkingHoursBundle:Category:index.html.twig', array('categories' => $categories));
    }
    
    public function createAction(Request $request)
    {
        $category = new categories;
        
        $form = $this->createFormBuilder($category)
                ->add('title', TextType::class, array('label' => 'Antraštė', 'attr' => array('class' => 'form-control')))
                ->add('description', TextareaType::class, array('label' => 'Aprašymas', 'attr' => array('class' => 'form-control')))
                ->add('save', SubmitType::class, array('label' => 'Įrašyti', 'attr' => array('class' => 'btn btn-primary')))
                ->getForm();
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $title = $form['title']->getData();
            $description = $form['description']->getData();
            
            $category->setTitle($title);
            $category->setDescription($description);
            
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($category);
            $em->flush();
            
            $this->addFlash('notice', 'Kategorija pridėta');
            
            return $this->redirectToRoute('working_hours_category_index');
        }
        
        return $this->render('WorkingHoursBundle:Category:create.html.twig', array('form' => $form->createView()));
    }
    
    public function editAction($id, Request $request)
    {
        $category = $this->getDoctrine()->getRepository('WorkingHoursBundle:categories')->find($id);
        
        $category->setTitle($category->getTitle());
        $category->setDescription($category->getDescription());

        $form = $this->createFormBuilder($category)
                ->add('title', TextType::class, array('label' => 'Antraštė', 'attr' => array('class' => 'form-control')))
                ->add('description', TextareaType::class, array('label' => 'Aprašymas', 'attr' => array('class' => 'form-control')))
                ->add('save', SubmitType::class, array('label' => 'Atnaujinti', 'attr' => array('class' => 'btn btn-primary')))
                ->getForm();
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $title = $form['title']->getData();
            $description = $form['description']->getData();
            
            $em = $this->getDoctrine()->getManager();
            $category = $em->getRepository('WorkingHoursBundle:categories')->find($id);
            
            $category->setTitle($title);
            $category->setDescription($description);
            
            $em->flush();
            
            $this->addFlash('notice', 'Kategorija atnaujinta');
            
            return $this->redirectToRoute('working_hours_category_index');
        }
        
        return $this->render('WorkingHoursBundle:Category:edit.html.twig', array('category' => $category, 'form' => $form->createView()));
    }
    
    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('WorkingHoursBundle:categories')->find($id);
        
        $em->remove($category);
        $em->flush();
        
        $this->addFlash('notice', 'Kategorija pašalinta');
        return $this->redirectToRoute('working_hours_category_index');
    }
}

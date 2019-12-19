<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ProStagesController extends AbstractController
{
    /**
     * @Route("/", name="pro_stages_accueil")
     */
    public function index()
    {
        return $this->render('pro_stages/index.html.twig');
    }
	/**
     * @Route("/entreprises", name="pro_stages_entreprises")
     */
    public function entreprises()
    {
        return $this->render('pro_stages/entreprises.html.twig');
    }
	
	/**
     * @Route("/formations", name="pro_stages_formations")
     */
    public function formations()
    {
        return $this->render('pro_stages/formations.html.twig');
    }
	
	/**
     * @Route("/stages/{id}", name="pro_stages_stages/{id}")
     */
    public function stages($id)
    {
        return $this->render('pro_stages/stages.html.twig',
		['id'=>$id]);
    }
}

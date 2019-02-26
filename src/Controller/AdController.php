<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Form\AnnonceType;
use App\Repository\AdRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdController extends AbstractController
{
    /**
     * @Route("/ads", name="ads_index")
     */
    public function index(AdRepository $leAdRepo)
    {

        $ads = $leAdRepo->findAll();

        return $this->render('ad/index.html.twig', [
            'ads' => $ads
        ]);
    }


    /**
     * Permet de créer une annonce détaillée
     * AdType ==> AnnonceType
     * @Route("/ads/create", name="ads_create")
     * @return Response
     */
    public function create(Request $request, ObjectManager $manager)
    {
        $newAd = new Ad();

        $form = $this->createForm(AnnonceType::class, $newAd);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($newAd);
            $manager->flush();

            $this->addFlash('success',
            "Votre annonce <strong>{$newAd->getTitle() }</strong> a bien été enregistré !");

            return $this->redirectToRoute('ads_show',['slug' => $newAd->getSlug()]
            );
        }
                                
        return $this->render('ad/create.html.twig',[
            'form' => $form->createView()
        ]);

        

    }

    /**
     * Permet d'afficher une annonce détaillée
     * @Route("/ads/{slug}", name="ads_show")
     * @return Response
     */
    public function show($slug, Ad $ad)
    {
        return $this->render('ad/show.html.twig', [
            'ad' => $ad
        ]);
    }


}

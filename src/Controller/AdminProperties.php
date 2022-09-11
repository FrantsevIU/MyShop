<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\PropertiesProducts;
use App\Form\CategoryType;
use App\Form\CategoryTypeProperties;
use App\Form\ProperiesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminProperties extends AbstractController
{
    /**
     * @Route("/addProperties", name="propertiesAdmin")
     */

    public function addProperties(Request $request, EntityManagerInterface $em)
    {

        $properties = new PropertiesProducts();
        $propertiesForm = $this->createForm(ProperiesType::class, $properties);
        $propertiesForm->handleRequest($request);


        if ($propertiesForm->isSubmitted() && $propertiesForm->isValid()) {

            $em->persist($properties);
            $em->flush();

            return $this->redirectToRoute('propertiesAdmin');
        }

        $propertiesAll= $em->getRepository(PropertiesProducts::class)->findAll();


        return $this->render('admin/addProperties.html.twig', [
            'propertiesForm' => $propertiesForm->createView(),
            'properties' => $propertiesAll,
        ]);
    }

//    /**
//     * @Route("/setPropertiesForCategory", name="setPropertiesForCategory")
//     */
//
//    public function setPropertiesCategory(Request $request, EntityManagerInterface $em)
//    {
//        $category = $em->getRepository(Category::class)->find(1);
//        $form = $this->createForm(CategoryTypeProperties::class, $category);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//
//            $em->persist($category);
//            $em->flush();
//        }
//        return $this->render('admin/addPropertiesCategory.html.twig', [
//            'form' => $form->createView(),
//
//        ]);

//    }


}


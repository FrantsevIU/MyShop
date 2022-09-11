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

class AdminCategory extends AbstractController
{
    /**
     * @Route("/addCategory", name="categoryAdmin")
     */

    public function addCategory(Request $request, EntityManagerInterface $em)
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($category);
            $em->flush();

        }

        $catall = $em->getRepository(Category::class)->findAll();

        return $this->render('admin/addCategory.html.twig', [
            'form' => $form->createView(),
            'catall' => $catall
        ]);
    }

    /**
     * @Route("/updateCategory/{id}", name="updateCategoryAdmin")
     */

    public function  updateCategory(int $id, Request $request, EntityManagerInterface $em)
    {
        $category = $em->getRepository(Category::class)->find($id);
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($category);
            $em->flush();
        }
            return $this->render('admin/updateCategory.html.twig', [
                'form' => $form->createView(),

            ]);
    }

//    /**
//     * @Route("/setPropertiesCategory", name="setPropertiesCategory")
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
//            return $this->render('admin/addPropertiesCategory.html.twig', [
//                'form' => $form->createView(),
//
//            ]);
//
//    }


}

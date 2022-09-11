<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Discriptions;
use App\Entity\Product;
use App\Entity\PropertiesProducts;
use App\Entity\PropertyValue;
use App\Form\DiscriptionsType;
use App\Form\PropertyValueType;
use App\Form\TestType;
use App\Form\Type\FormAdmin\ProductAdminType;
use App\Service\File\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminProductController extends AbstractController
{


    /**
     * @Route("/addProduct", name="addProduct")
     */

    public function addProduct(Request $request, FileUploader $fileUploader, EntityManagerInterface $em): Response
    {

        $task = new Product();

        $form = $this->createForm(ProductAdminType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**  @VAR UploadedFile $imgProduct */
            $imgProduct = $form->get('imgProduct')->getData();
            if ($imgProduct) {
                $imgProductName = $fileUploader->upLoad($imgProduct);
                $task->setImgProduct($imgProductName);
            }
            $em->persist($task);
            $em->flush();

            return $this->redirectToRoute('homePage');
        }

        return $this->render('admin/addProduct.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/updateProduct", name="updateProduct")
     */

    public function updateProduct(EntityManagerInterface $em)
    {

        $product = $em->getRepository(Product::class)->findAll();

        return $this->render('admin/updateProduct.html.twig', [
            'item' => $product
        ]);

    }

    /**
     * @Route("/updateProduct/{id}", name="updateProductId")
     */

    public function updateProductId($id, Request $request, FileUploader $fileUploader, EntityManagerInterface $em)
    {
        $product = $em->getRepository(Product::class)->find($id);

        $tag1 = new PropertiesProducts();


        $form = $this->createForm(ProductAdminType::class, $product);
        $form->handleRequest($request);


        $discription = new Discriptions();
        $discriptionForm = $this->createForm(DiscriptionsType::class, $discription);
        $discriptionForm->handleRequest($request);

        $propertyValue = new PropertyValue();
//        $propertyValue = $em->getRepository(PropertyValue::class)->find($id);
        $propertyValueForm = $this->createForm(PropertyValueType::class, $propertyValue);
        $propertyValueForm->handleRequest($request);

        // get name properties value

        $categoryId = explode(', ',
            $em->getRepository(Category::class)
                ->find($product->getCategory())
                ->getPropertiesId()
        );
        $propertiesId = $em->getRepository(PropertiesProducts::class)->findByExampleField($categoryId);
        $valueName = $em->getRepository(PropertyValue::class)->findByExampleField($propertiesId);


        dump($valueName);


//        die(1);




        if ($form->isSubmitted() && $form->isValid()) {
            /**  @VAR UploadedFile $imgProduct */
            $imgProduct = $form->get('imgProduct')->getData();
            if ($imgProduct) {
                $imgProductName = $fileUploader->upLoad($imgProduct);
                $product->setImgProduct($imgProductName);

                $em->persist($product);
                $em->flush();
            }
        }
        if ($discriptionForm->isSubmitted() && $discriptionForm->isValid()) {

            $em->persist($discription);
            $em->flush();

            return $this->redirectToRoute('homePage');
        }
        if ($propertyValueForm->isSubmitted() && $propertyValueForm->isValid()) {

            $em->persist($propertyValue);
            $em->flush();

            return $this->redirectToRoute('homePage');
        }


        return $this->render('admin/UpdateProductId.html.twig', [
            'item' => $product,
            'form' => $form->createView(),
            'discForm' => $discriptionForm->createView(),
            'propertyValueForm' => $propertyValueForm->createView(),
            'p' => $valueName,

        ]);

    }

    /**
     * @Route("/dellProduct/{id}", name="dellProductId")
     */

    public function dellProductId(EntityManagerInterface $em, int $id)
    {
        $product = $em->getRepository(Product::class)->findOneBy(['id' => $id]);
        $em->remove($product);
        $em->flush();

        return $this->redirectToRoute('updateProduct');


    }

    /**
     * @Route("/testform", name="testform")
     */

    public function testForm(Request $request,EntityManagerInterface $em)
    {
        $task = new Product();

        $form = $this->createForm(ProductAdminType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($task);
            $em->flush();
        }

        return $this->renderForm('admin/testform.html.twig', [
            'form' => $form,
        ]);
    }


}


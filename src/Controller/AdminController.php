<?php


namespace App\Controller;

use App\Entity\Product;

use App\Service\Admin\product\ProductAdmin;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AdminController extends AbstractController
{

    /**
     * @Route("/adminHome", name="adminHome")
     */

    public function homeAdmin(): Response
    {

        return $this->render('admin/adminHome.html.twig');

    }

    /**
     * @Route("/productAdmin", name="productAdmin")
     */

    public function productAdmin(EntityManagerInterface $em,ProductAdmin $Product): Response
    {

        return $this->render('admin/ProductAdmin.html.twig');

    }

    public function ordersAdmin(): Response
    {

        return $this->render('admin/adminHome.html.twig');

    }

    public function cartsAdmin(): Response
    {

        return $this->render('admin/adminHome.html.twig');

    }

    public function usersAdmin(): Response
    {

        return $this->render('admin/adminHome.html.twig');

    }


}

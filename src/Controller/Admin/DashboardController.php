<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use App\Entity\User;
use App\Entity\Comment;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->redirect($routeBuilder->setController(PostCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Blog')

<<<<<<< HEAD
            ;
=======
			;
>>>>>>> a39f7e51a2b71bf646c50a13e2ffe5d3f38d67ea
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
<<<<<<< HEAD
        yield MenuItem::section('Important');
        yield MenuItem::linkToCrud('Users', 'fa fa-user-circle', User::class);
        yield MenuItem::linkToCrud('Posts', 'fa fa-newspaper-o', Post::class);
        yield MenuItem::linkToCrud('Comments', 'fa fa-comments', Comment::class);
=======
		yield MenuItem::section('Important');
		yield MenuItem::linkToCrud('Users', 'fa fa-user-circle', User::class);
        yield MenuItem::linkToCrud('Posts', 'fa fa-newspaper-o', Post::class);
		yield MenuItem::linkToCrud('Comments', 'fa fa-comments', Comment::class);
>>>>>>> a39f7e51a2b71bf646c50a13e2ffe5d3f38d67ea
        // yield MenuItem::linkToCrud('The Label', 'icon class', EntityClass::class);
    }
}

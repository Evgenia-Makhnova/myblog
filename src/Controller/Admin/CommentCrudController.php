<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class CommentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Comment::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('user.name'),
            TextEditorField::new('content'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
<<<<<<< HEAD
            ->disable(Action::NEW, Action::EDIT);
    }
=======
            ->disable( Action::NEW, Action::EDIT);
    }

>>>>>>> a39f7e51a2b71bf646c50a13e2ffe5d3f38d67ea
}

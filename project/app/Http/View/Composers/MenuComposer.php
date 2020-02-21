<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Spatie\Menu\Laravel\Facades\Menu;
use Spatie\Menu\Laravel\Link;

class MenuComposer
{
    public function compose(View $view)
    {
        $class = 'text-gray-300 no-underline text-base';
        $menu  = Menu::new()
                     ->addClass('p-8')
                     ->add(Link::to('/', 'Dashboard')->addClass($class))
                     ->submenu('<span class="uppercase">Gestion</span>', Menu::new()
                                                                             ->add(Link::toRoute('agenda', 'Agenda')
                                                                                       ->addClass($class))
                                                                             ->add(Link::toRoute('analytics', 'Analytics')
                                                                                       ->addClass($class)))
                     ->submenu('<span class="uppercase">Éléments</span>', Menu::new()
                                                                              ->add(Link::toRoute('clients.index', 'Clients')
                                                                                        ->addClass($class))
                                                                              ->add(Link::toRoute('projects.index', 'Projets')
                                                                                        ->addClass($class))
                                                                              ->add(Link::toRoute('resources.index', 'Ressources')
                                                                                        ->addClass($class))
                                                                              ->add(Link::toRoute('tasks.index', 'Ticket')
                                                                                        ->addClass($class)))
                     ->submenu('<span class="uppercase">Créer</span>', Menu::new()
                                                                           ->add(Link::toRoute('clients.create', 'Client')
                                                                                     ->addClass($class))
                                                                           ->add(Link::toRoute('projects.create', 'Projet')
                                                                                     ->addClass($class))
                                                                           ->add(Link::toRoute('resources.create', 'Ressource')
                                                                                     ->addClass($class))
                                                                           ->add(Link::toRoute('tasks.create', 'Ticket')
                                                                                     ->addClass($class)));

        $view->with('menu', $menu);
    }
}
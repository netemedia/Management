<?php

return [
    'resources' => [
        [
            'first_name' => 'Christopher',
            'last_name'  => 'Bulhé',
        ],
        [
            'first_name' => 'Lorenzo',
            'last_name'  => 'Milesi',
        ],
        [
            'first_name' => 'Julia',
            'last_name'  => 'Assad',
        ],
        [
            'first_name' => 'Théo',
            'last_name'  => 'Costantini',
        ],
        [
            'first_name' => 'Alexandra',
            'last_name'  => 'Piquard-Aussenac',
        ],
        [
            'first_name' => 'Julie',
            'last_name'  => 'Delion',
        ],
        [
            'first_name' => 'Laurie',
            'last_name'  => 'Montaz',
        ],
        [
            'first_name' => 'Matthieu',
            'last_name'  => 'Moreau',
        ],
    ],
    'clients'   => [
        [ 'name' => 'WEI' ],
        [ 'name' => 'Ipéria' ],
        [ 'name' => 'Find\'N\'Geek' ],
        [ 'name' => 'Mantion' ],
        [ 'name' => 'Maghen' ],
        [ 'name' => 'Playgrnd*' ],
        [ 'name' => 'FNADEPA' ],
        [ 'name' => 'Quies' ],
        [ 'name' => 'Nexeo' ],
        [ 'name' => 'SPA Alina' ],
        [ 'name' => 'Airwell' ],
        [ 'name' => 'ACS' ],
    ],
    'projects'  => [
        [
            'name'      => 'Refonte W4',
            'client'    => 'WEI',
            'resources' => [
                [
                    'name'     => 'Christopher',
                    'position' => 'lead',
                ],
                [
                    'name' => 'Julia',
                ],
                [
                    'name' => 'Lorenzo',
                ],
                [
                    'name'     => 'Julie',
                    'position' => 'manager',
                ],
            ],
        ],
        [
            'name'      => 'TMA Ipéria',
            'client'    => 'Ipéria',
            'resources' => [
                [
                    'name'     => 'Lorenzo',
                    'position' => 'lead',
                ],
                [
                    'name' => 'Julia',
                ],
                [
                    'name'     => 'Julie',
                    'position' => 'manager',
                ],
            ],
        ],
        [
            'name'      => 'Tests Ipéria',
            'client'    => 'Ipéria',
            'resources' => [
                [
                    'name'     => 'Lorenzo',
                    'position' => 'lead',
                ],
                [
                    'name'     => 'Julie',
                    'position' => 'manager',
                ],
            ],
        ],
        [
            'name'      => 'Plateforme FNG',
            'client'    => 'Find\'N\'Geek',
            'resources' => [
                [
                    'name'     => 'Christopher',
                    'position' => 'lead',
                ],
                [
                    'name' => 'Lorenzo',
                ],
                [
                    'name'     => 'Julie',
                    'position' => 'manager',
                ],
            ],
        ],
        [
            'name'      => 'Refonte Mantion',
            'client'    => 'Mantion',
            'resources' => [
                [
                    'name'     => 'Théo',
                    'position' => 'lead',
                ],
                [
                    'name' => 'Christopher',
                ],
                [
                    'name'     => 'Alexandra',
                    'position' => 'manager',
                ],
            ],
        ],
        [
            'name'      => 'Refonte FFTB',
            'client'    => 'Playgrnd*',
            'resources' => [
                [
                    'name'     => 'Julia',
                    'position' => 'lead',
                ],
                [
                    'name' => 'Lorenzo',
                ],
                [
                    'name'     => 'Julie',
                    'position' => 'manager',
                ],
            ],
        ],
        [
            'name'      => 'TMA FNADEPA',
            'client'    => 'FNADEPA',
            'resources' => [
                [
                    'name'     => 'Lorenzo',
                    'position' => 'lead',
                ],
                [
                    'name' => 'Théo',
                ],
                [
                    'name'     => 'Julie',
                    'position' => 'manager',
                ],
            ],
        ],
        [
            'name'      => 'Refonte Quies',
            'client'    => 'Quies',
            'resources' => [
                [
                    'name'     => 'Théo',
                    'position' => 'lead',
                ],
                [
                    'name'     => 'Laurie',
                    'position' => 'manager',
                ],
            ],
        ],
        [
            'name'      => 'TMA Nexeo',
            'client'    => 'Nexeo',
            'resources' => [
                [
                    'name'     => 'Julia',
                    'position' => 'lead',
                ],
                [
                    'name'     => 'Alexandra',
                    'position' => 'manager',
                ],
            ],
        ],
        [
            'name'      => 'TMA SPA Alina',
            'client'    => 'SPA Alina',
            'resources' => [
                [
                    'name'     => 'Christopher',
                    'position' => 'lead',
                ],
                [
                    'name'     => 'Julie',
                    'position' => 'manager',
                ],
            ],
        ],
        [
            'name'      => 'TMA Poseidon',
            'client'    => 'SPA Alina',
            'resources' => [
                [
                    'name'     => 'Christopher',
                    'position' => 'lead',
                ],
                [
                    'name'     => 'Alexandra',
                    'position' => 'manager',
                ],
            ],
        ],
        [
            'name'      => 'TMA Airwell',
            'client'    => 'Airwell',
            'resources' => [
                [
                    'name'     => 'Christopher',
                    'position' => 'lead',
                ],
                [
                    'name'     => 'Alexandra',
                    'position' => 'manager',
                ],
            ],
        ],
        [
            'name'      => 'Sylius Maghen',
            'client'    => 'Maghen',
            'resources' => [
                [
                    'name'     => 'Lorenzo',
                    'position' => 'lead',
                ],
                [
                    'name' => 'Théo',
                ],
                [
                    'name'     => 'Matthieu',
                    'position' => 'manager',
                ],
            ],
        ],
    ],
    'tasks'     => [
        [
            'project'    => 'Refonte W4',
            'resource'   => 'Christopher',
            'title'      => 'Installation de plugin',
            'url'        => 'https://trello.com/c/5GDV9pJx/114-g%C3%A9n%C3%A9ration-des-factures-et-re%C3%A7us-fiscaux',
            'effort'     => '1',
            'estimation' => '2',
        ],
        [
            'project'    => 'Refonte W4',
            'resource'   => 'Christopher',
            'title'      => 'Création de template de reçu fiscaux',
            'url'        => 'https://trello.com/c/5GDV9pJx/114-g%C3%A9n%C3%A9ration-des-factures-et-re%C3%A7us-fiscaux',
            'effort'     => '2',
            'estimation' => '4',
        ],
        [
            'project'    => 'Plateforme FNG',
            'resource'   => 'Christopher',
            'title'      => 'Filtres par critères de notation',
            'url'        => 'https://trello.com/c/C3hFap5N/36-etablissement-filtres-par-crit%C3%A8res-de-notation',
            'effort'     => '2',
            'estimation' => '4',
        ],
        [
            'project'    => 'Plateforme FNG',
            'resource'   => 'Lorenzo',
            'title'      => 'Affichage si pas d\'avis',
            'url'        => 'https://trello.com/c/eEUZylW9/24-affichage-si-pas-davis',
            'effort'     => '1',
            'estimation' => '1',
        ],
        [
            'project'    => 'Refonte W4',
            'resource'   => 'Julia',
            'title'      => 'Suppression des informations inutiles dans le BO (projets)',
            'url'        => 'https://trello.com/c/FzJViLcA/135-suppression-des-informations-inutiles-dans-le-bo-projets',
            'effort'     => '2',
            'estimation' => '3',
        ],
        [
            'project'    => 'Refonte W4',
            'resource'   => 'Lorenzo',
            'title'      => 'Design des pop-in de création de projet',
            'url'        => 'https://trello.com/c/iuVhOKTW/131-design-des-pop-in-de-cr%C3%A9ation-de-projet',
            'effort'     => '2',
            'estimation' => '3',
        ],
        [
            'project'    => 'Tests Ipéria',
            'resource'   => 'Lorenzo',
            'title'      => 'Mise en ligne des tests Ipéria',
            'url'        => '',
            'effort'     => '2',
            'estimation' => '4',
        ],
    ],
    'users' => [
        [
            'name' => 'Christopher',
            'email' => 'cbulhe@netemedia.fr',
        ],
        [
            'name' => 'Lorenzo',
            'email' => 'lmilesi@netemedia.fr'
        ],
        [
            'name' => 'Julie',
            'email' => 'jdelion@netemedia.fr'
        ],
        [
            'name' => 'Matthieu',
            'email' => 'mmoreau@netemedia.fr'
        ],
    ]
];

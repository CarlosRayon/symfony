<?php

namespace App\DataFixtures;

use App\Entity\User;

class DataProvider
{

    const USERS_DATA = [

        'admin' => [
            'name' => 'Toad',
            'surname' => 'Bros',
            'phone' => '666666666',
            'email' => 'tbros@alares.es',
            'password' => 'toad',
            'roles' => [User::ADMIN]
        ],
        'commercial-one' => [
            'name' => 'Mario',
            'surname' => 'Bros',
            'phone' => '666666666',
            'email' => 'mbros@alares.es',
            'password' => 'mario',
            'roles' => [User::COMMERCIAL]
        ],
        'commercial-two' => [
            'name' => 'Luigi',
            'surname' => 'Bros',
            'phone' => '666666666',
            'email' => 'lbros@alares.es',
            'password' => 'luigi',
            'roles' => [User::COMMERCIAL]
        ],
        'projectManager' => [
            'name' => 'Carlos',
            'surname' => 'Bros',
            'phone' => '666666666',
            'email' => 'crayon@alares.es',
            'password' => 'carlos',
            'roles' => [User::PROJECT_MANAGER]
        ],
        'technician-one' => [
            'name' => 'Browser',
            'surname' => 'Bros',
            'phone' => '666666666',
            'email' => 'bbros@alares.es',
            'password' => 'browser',
            'roles' => [User::TECHNICIAN]
        ],
        'technician-two' => [
            'name' => 'Wario',
            'surname' => 'Bros',
            'phone' => '666666666',
            'email' => 'wbros@alares.es',
            'password' => 'wario',
            'roles' => [User::TECHNICIAN]
        ],
        'customer' => [
            'name' => 'Peach',
            'surname' => 'Bros',
            'phone' => '666666666',
            'email' => 'pbros@alares.es',
            'password' => 'peach',
            'roles' => [User::CUSTOMER]
        ],



    ];
}

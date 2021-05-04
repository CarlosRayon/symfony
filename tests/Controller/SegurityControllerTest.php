<?php

namespace App\Tests\Controller;

use App\DataFixtures\DataProvider;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SegurityControllerTest extends WebTestCase
{

    /**
     * @dataProvider providerEs
     */
    public function testLogin($user, $pass, $textButton, $url, $redirect): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', $url);

        $this->assertResponseIsSuccessful();
        $this->assertResponseStatusCodeSame('200', 'Response code IS NOT 200');

        /* Validate exist the element */
        $this->assertSelectorExists('#inputEmail', 'selector #inputEmail NOT EXIST');
        $this->assertSelectorExists('#inputPassword', 'selector #inputPassword NOT EXIST');

        /* Validate the form send and the redirect */
        $form = $crawler->selectButton($textButton)->form();
        $form['email'] = $user;
        $form['password'] = $pass;
        $crawler = $client->submit($form);

        $this->assertResponseRedirects($redirect);
    }

    public function providerEs()
    {
        return [
            [
                DataProvider::USERS_DATA['admin']['email'],
                DataProvider::USERS_DATA['admin']['password'],
                'Entrar',
                '/es/login',
                '/es/back/administrator'
            ],
            [
                DataProvider::USERS_DATA['admin']['email'],
                DataProvider::USERS_DATA['admin']['password'],
                'Sign in',
                '/en/login',
                '/en/back/administrator'
            ],
            [
                DataProvider::USERS_DATA['commercial-one']['email'],
                DataProvider::USERS_DATA['commercial-one']['password'],
                'Entrar',
                '/es/login',
                '/es/back/commercial'
            ],
            [
                DataProvider::USERS_DATA['commercial-one']['email'],
                DataProvider::USERS_DATA['commercial-one']['password'],
                'Sign in',
                '/en/login',
                '/en/back/commercial'
            ],
            [
                DataProvider::USERS_DATA['projectManager']['email'],
                DataProvider::USERS_DATA['projectManager']['password'],
                'Entrar',
                '/es/login',
                '/es/back/project_manager'
            ],
            [
                DataProvider::USERS_DATA['projectManager']['email'],
                DataProvider::USERS_DATA['projectManager']['password'],
                'Sign in',
                '/en/login',
                '/en/back/project_manager'
            ],
            [
                DataProvider::USERS_DATA['technician-one']['email'],
                DataProvider::USERS_DATA['technician-one']['password'],
                'Entrar',
                '/es/login',
                '/es/back/technician'
            ],
            [
                DataProvider::USERS_DATA['technician-one']['email'],
                DataProvider::USERS_DATA['technician-one']['password'],
                'Sign in',
                '/en/login',
                '/en/back/technician'
            ],
            [
                DataProvider::USERS_DATA['customer']['email'],
                DataProvider::USERS_DATA['customer']['password'],
                'Entrar',
                '/es/login',
                '/es/back/customer'
            ],
            [
                DataProvider::USERS_DATA['customer']['email'],
                DataProvider::USERS_DATA['customer']['password'],
                'Sign in',
                '/en/login',
                '/en/back/customer'
            ]
        ];
    }
}

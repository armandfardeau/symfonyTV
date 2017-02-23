<?php

namespace SfWebApp\APIBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UsersControllerTest extends WebTestCase
{
    public function testUsers()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/users');
    }

    public function testUser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user');
    }

}

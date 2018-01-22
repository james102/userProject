<?php

namespace umespa\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AlunoControllerControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Index');
    }

    public function testAddaluno()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addAluno');
    }

    public function testViewaluno()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/viewAluno');
    }

    public function testEditaluno()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/editAluno');
    }

}

<?php

namespace Intellias\TestBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProjectControllerTest extends WebTestCase
{

    private $client = null;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function doLogin() {
       $crawler = $this->client->request('GET', '/login');
       $form = $crawler->selectButton('Log in')->form(array(
            '_username'  => 'admin',
            '_password'  => 'popilpopil',
        ));
        $this->client->submit($form);
        $this->assertTrue($this->client->getResponse()->isRedirect());
    }




    public function testCompleteScenario()
    {
        // Check login
        $this->doLogin();

        // Check list project
        $crawler = $this->client->request('GET', '/project/');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /project/");

        // Check add new project
        $crawler = $this->client->click($crawler->selectLink('Add')->link());
        $form = $crawler->selectButton('Create')->form(array(
            'intellias_testbundle_project[name]'  => 'Test intellias project',
            'intellias_testbundle_project[description]'  => 'Description test Intellias Project',

        ));
        $this->client->submit($form);
        $this->assertTrue($this->client->getResponse()->isRedirect());
        $crawler = $this->client->followRedirect();

        // Check show project
        $crawler = $this->client->click($crawler->selectLink('Test intellias project')->link());

        // Check  edit projeect
        $crawler = $this->client->click($crawler->selectLink('Edit')->link());

        $form = $crawler->selectButton('Save')->form(array(
            'intellias_testbundle_project[name]'  => 'New test intellias project',
        ));

        $this->client->submit($form);
        $this->assertTrue($this->client->getResponse()->isRedirect());
        $crawler = $this->client->followRedirect();


        // Check delete project
        $idProject = $crawler->selectLink('New test intellias project')->attr('data-id');
        $this->client->request('GET', '/project/'.$idProject.'/delete');
        $this->assertTrue($this->client->getResponse()->isRedirect());
    }


}

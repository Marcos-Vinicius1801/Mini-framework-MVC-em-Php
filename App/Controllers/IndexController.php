<?php
namespace App\Controllers;

use SON\Controller\Action;
use SON\DI\Container;


class IndexController extends Action
{

    public function index()
    {
        $client = Container::getModel("Clients");
        $this->views->clients = $client->fetchAll();
        $this->render("index");
    }

    public function contact()
    {
        $client = Container::getModel("Clients");
        $this->views->clients = $client->find(1);

        $this->render("contact");
    }
}
<?php

namespace Intellias\TestBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DashboardController extends Controller
{
    /**
     * @Route("/", name="dashboard")
     * @Route("/dashboard")
     */
    public function indexAction()
    {
        return $this->render('IntelliasTestBundle:Dashboard:index.html.twig');
    }
}

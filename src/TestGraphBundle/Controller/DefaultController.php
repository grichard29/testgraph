<?php

namespace TestGraphBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Ob\HighchartsBundle\Highcharts\Highchart;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {	
		$dates = array('03/03', '04/03', '10/03', '11/03', '17/03', '18/03', '24/03');
		$frequentations = array(array(
			'name' => 'Fréquentations' ,
			'data' => array(0, 2, 2, 7, 3, 1, 1)
		));
		
        $ob = new Highchart();
        
        $ob->chart->renderTo('columnchart');
        $ob->title->text('Fréquentation des 15 dernières permanences');//OK
        $ob->chart->type('column');

        $ob->yAxis->title(array('text'=>"Frequentations"));
	
        $ob->xAxis->title(array('text' => "Dates"));
        $ob->xAxis->categories($dates);

        $ob->series($frequentations);

        return $this->render('TestGraphBundle:Default:template.html.twig',array(
            'columnchart' => $ob
        ));//OK presque
    }
}

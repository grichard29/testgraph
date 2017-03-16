<?php
  use ObHighchartsBundleHighchartsHighchart;

  public function freqPermAction(){
		/*
	  	$em = $this->getDoctrine()->getManager();
		
		$reports = $em->getRepository('ESNPermanenceBundle:PermanenceReport')->findBy(array(), array('date' => 'DESC'), 15); //Prend les 15 derniers rapports 
	
		$frequentations=array_fill(0,15,1);
		
		for ($i=14, $i=>0, $i--){
			$frequentations[$i] = $reports[14-$i]->getFrequentation(); 
		}
		
		$dates=array_fill(0,15,date("d m Y"));

		for ($i=14, $i=>0, $i--){
			$dates[$i] = $reports[14-$i]->getDate()->format("d/m/Y");
		}
		*/
		
		$date = array();
		$frequentations = array();
		
        $ob = new Highchart();
        // ID de l'élement de DOM que vous utilisez comme conteneur
        $ob->chart->renderTo('barchart');
        $ob->title->text('Fréquentation des 15 dernières permanences');
        $ob->chart->type('column');

        $ob->yAxis->title(array('text' => "Fréquentation"));

        $ob->xAxis->title(array('text' => "Date"));
        $ob->xAxis->categories($dates);

        $ob->series($frequentations);

        return $this->render('PaloBundle:Chart:template.html.twig', array(
            'barchart' => $ob
        ));

  }

?>
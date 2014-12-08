<?php

class BathroomController extends Controller {

	public function loadMap(){

		$doc = domxml_new_doc("1.0");
		$node = $doc->create_element("markers");
		$parnode = $doc->append_child($node);

		$bathrooms = DB::table('bathrooms')->get();



		header("Content-type: text/xml");

		// Iterate through the rows, adding XML nodes for each
		foreach($bathrooms as $bathroom){
		  // ADD TO XML DOCUMENT NODE
		  $node = $doc->create_element("marker");
		  $newnode = $parnode->append_child($node);

		  $newnode->set_attribute("name", $bathroom->description);
		  $newnode->set_attribute("address", $bathroom->concurrency);
		  $newnode->set_attribute("lat", $bathroom->lat );
		  $newnode->set_attribute("lng", $bathroom->lng);
		  $newnode->set_attribute("type", $bathroom->handicap);
		}

		$xmlfile = $doc->dump_mem();
		echo $xmlfile;


	}

}
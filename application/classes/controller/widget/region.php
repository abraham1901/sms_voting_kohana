<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Widget_Region extends Controller_Widget
{
	public $template = 'widget/region';
	
	public function action_index()
	{		
		$session = Session::instance();
		if(!($region = $session->get('region',false)))
		{
			$ip = $_SERVER['REMOTE_ADDR'];
			$q = "http://ipgeobase.ru:7020/geo?ip=$ip";
			$xml = file_get_contents($q);
			$response = new SimpleXMLElement($xml);
			$region_name = $response->ip->region;
			$region = new Model_region();
			$region = $region
				->where('name','=',$region_name)
				->find();
			$session->set('region',$region);
		}
		if(!($regions = $session->get('regions',false)))
		{
			$regions = new Model_Region();
			$regions = $regions->order_by('name','asc')->find_all();
			$session->set('regions',$regions);
		};		
		
		$this->response->body(
			View::factory($this->template)
				->bind('regions',$regions)
				->bind('region',$region)
		);
		
	}
}

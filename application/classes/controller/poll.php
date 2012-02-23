<?php defined('SYSPATH') or die('No direct script access.');

function getRegion()
{
	$session = Session::instance();
	if(!($region = $session->get('region',false)))
	{
		$ip = $_SERVER['REMOTE_ADDR'];
		$q = "http://ipgeobase.ru:7020/geo?ip=$ip";
		$xml = file_get_contents($q);
		$response = new SimpleXMLElement($xml);
		$region_name = $response->ip->region;
		$region = ORM::factory('region')
			->where('name','=',$region_name)
			->find();
		$session->set('region',$region);
	}
	return $region;
}

class Controller_Poll extends Controller_Template
{
	
	public function action_actual()
	{		
		//$this->template->region = getRegion();
		$region = getRegion();
		// create view instance
		//$view = View::factory('poll/list');
		//
		$timestamp = date('Y-m-d H:i:s', time());
		
		//$view->polls = ORM::factory('poll')
		$poll = ORM::factory('poll')
			->join('polls_regions','left')
			->on('polls_regions.poll_id','=', DB::expr('poll.id'))
			->where('active','=',1)
			->where('start_date','<=',$timestamp)
			->or_where_open()
			->where('end_date','>',$timestamp)
			->where('end_date','=',null)
			->or_where_close()
			->where('polls_regions.region_id','=',$region->id)
			->order_by('start_date','desc')
			//->find_all();
			->find();

		if(count($poll))
		{
			//render view
			$view = View::factory('poll/item');
			//$this->template->title = 'Актуальные голосования';
			$region_count = $poll->regions->count_all();
			$view->region_count = $region_count;
			if($region_count == 1)
			{
				$region = $poll->regions->find();
				$this->template->title = ($poll->title . ', '. $region->name);
			}
			else
				$this->template->title = $poll->title;
			$view->poll = $poll;	
		}
		else
		{
			$this->template->title = 'Ничего не нашли';
			$view = View::factory('poll/not_found');
			$view->region = $region;
		}
		$this->template->content = $view;
	}
	public function action_archive()
	{
		// create view instance
		$view = View::factory('poll/list');
		//
		$timestamp = date('Y-m-d H:i:s', time());
		
		$view->polls = ORM::factory('poll')
			->or_where_open()
			->where('active','=',0)
			->where('end_date','<',$timestamp)
			->or_where_close()
			->order_by('start_date','desc')
			->find_all();
		$this->template->title = 'Архив голосований';
		$this->template->content = $view;
	}
	public function action_future()
	{
		// create view instance
		$view = View::factory('poll/list');
		//
		$timestamp = date('Y-m-d H:i:s', time());
		
		$view->polls = ORM::factory('poll')
			->where('start_date','>',$timestamp)
			->order_by('start_date','desc')
			->find_all();
		$this->template->title = 'Будущие голосования';
		$this->template->content = $view;
	}
	public function action_poll()
	{
		$id = $this->request->param('id');
		$view = $this->request->param('view');
		$this->template->nt = isset($_GET['nt']);
		
		// create view instance
		if($view)
		{
			$view = View::factory("poll/$view");
			$this->template->nt = true;
		}
		else
			$view = View::factory('poll/item');
		
		$poll = ORM::factory('poll',$id);
		$view->poll = $poll;
			
		//render view
		$region_count = $poll->regions->count_all();
		$view->region_count = $region_count;
		if($region_count == 1)
		{
			$region = $poll->regions->find();
			$this->template->title = ($poll->title . ', '. $region->name);
		}
		else
			$this->template->title = $poll->title;
      
		$this->template->content = $view;
	}
}

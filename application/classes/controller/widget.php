<?php
class Controller_Widget extends Controller
{
	public function before()
	{
		if($this->request->is_initial())
		{
			throw new HTTP_Exception_404('File not found!');
		}
	}
}

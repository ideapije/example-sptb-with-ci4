<?php

namespace App\Controllers;

class ProjectController extends BaseController
{
	public function index()
	{	
		$data['title'] = 'Projects List';
		return view('projects/index', $data);
	}
}

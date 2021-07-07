<?php

namespace App\Controllers;

use App\Models\ContactModel;

class Home extends BaseController
{
	protected $contactModel;
	public function __construct()
	{
		$this->contactModel = new ContactModel();
	}

	public function index()
	{
		$data = [
			// show all the contacts information based on date created
			// only show 10 items every page
			'contacts' => $this->contactModel->orderBy('created_at', 'desc')->paginate(10, 'contacts'),
			// links for pagination based on model
			'pager' => $this->contactModel->pager,
			// calculation for numbering for each rows
			'currentPage' => $this->request->getVar('page_contacts') ? $this->request->getVar('page_contacts') : 1,
		];

		return view('pages/home', $data);
	}
}

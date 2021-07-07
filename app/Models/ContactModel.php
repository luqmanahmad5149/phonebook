<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\Null_;

class ContactModel extends Model
{
	protected $table                = 'contacts';
	protected $primaryKey           = 'id';
	protected $useTimestamps        = true;
	protected $allowedFields		= ['name', 'contact'];


	// Check for contacts table in database

	public function getContacts($id = false)
	{
		if ($id == false) {
			// return all contacts information
			return $this->orderBy('created_at','desc')->findAll();
		}
		// return contact based on the id given
		return $this->where(['id' => $id])->first();
	}
}

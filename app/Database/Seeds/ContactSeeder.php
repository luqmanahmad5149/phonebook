<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ContactSeeder extends Seeder
{
	public function run()
	{
		$model = model('ContactModel');
		
		for($i = 0; $i < 40; $i++) {
			$model->insert([
					'name'      => static::faker()->name,
					'contact' => static::faker()->phoneNumber,
					'created_at' => static::faker()->dateTime,
					'updated_at' => static::faker()->dateTime
			]);
		}
	}
}

<?php

class ContactSeeder extends Seeder {

	public function run()
	{
		$data = [

			['name'=>'Dragan', 'surname'=>'Jovanovic', 'phone'=>'0691621081', 'address'=>'Vizantijski Bulevar 28/29 18000 Nis', 'comment'=>'Android platform'],
			['name'=>'Mica', 'surname'=>'Petrovic', 'phone'=>'0691621081222', 'address'=>'Milosev Bulevar 30 18000 Nis', 'comment'=>'IOS platform'],
			['name'=>'Zarko', 'surname'=>'Rakocevic', 'phone'=>'0641621081222', 'address'=>'Zabranski Put 40 11000 Beograd', 'comment'=>'Windows platform'],

		];

		Contact::insert($data);
	}

}

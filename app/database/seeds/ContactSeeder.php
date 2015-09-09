<?php

class ContactSeeder extends Seeder {

	public function run()
	{
		$data = [

			['name'=>'Dragan', 'surname'=>'Jovanovic', 'phone'=>'0691621081', 'address'=>'Vizantijski Bulevar 28/29 18000 Nis', 'comment'=>'Android platform'],
			['name'=>'Mica', 'surname'=>'Petrovic', 'phone'=>'0691621081222', 'address'=>'Milosev Bulevar 30 18000 Nis', 'comment'=>'IOS platform'],
			['name'=>'Zarko', 'surname'=>'Rakocevic', 'phone'=>'0641621081222', 'address'=>'Zabranski Put 40 11000 Beograd', 'comment'=>'Windows platform'],

		];

		$random = [];

		for($i = 0; $i < 30; $i++){

			$random[$i]['name'] = str_random(7);
			$random[$i]['surname'] = str_random(10);
			$random[$i]['phone'] = rand(1000000,9000000);
			$random[$i]['address'] = str_random(7) . ' ' . str_random(15);
			$random[$i]['comment'] = str_random(7) . ' ' . str_random(15);

		}

		Contact::insert(array_merge($data,$random));
	}

}

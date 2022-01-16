<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;
use Faker\Factory;

class FestivalsSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('Festivals')->where("id > ",0)->delete();
        $this->db->query("ALTER TABLE Festivals AUTO_INCREMENT=1");

        $faker = Factory::create();

        $festivalsBuilder = $this->db->table('Festivals');

        $festivals = [
            [
                'name'   => $faker->name,
                'email'      => 'admin@test.com',
                'date'   => new Time(),
                'price'       => 10,
                'address'    => $faker->address,
                'image_url'    => 'an url',
                'category_id' => 1,
                'created_at' => new Time('now', 'Europe/Madrid', 'es_ES'),
            ],
            [
                'name'   => $faker->name,
                'email'      => $faker->email,
                'date'   => new Time(),
                'price'       => 10,
                'address'    => $faker->address,
                'image_url'    => 'an url',
                'category_id' => 2,
                'created_at' => new Time('now', 'Europe/Madrid', 'es_ES'),
            ]
        ];

        $festivalsBuilder->insertBatch($festivals);
    }
}
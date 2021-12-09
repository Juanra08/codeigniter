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
                'username' => $faker->username,
                'email' => "admin@test.com",
                'password' => "1234",
                'name' => $faker->name,
                'surname' => $faker->name,
                'created_at' => new Time(),
                'role_id' => 1
            ],
            [
                'username' => $faker->username,
                'email' => "client@test.com",
                'password' => "1234",
                'name' => $faker->name,
                'surname' => $faker->name,
                'created_at' => new Time(),
                'role_id' => 2
            ],
        ];
    }
}
<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;
use Faker\Factory;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('Roles')->where("id > ",0)->delete();
        $this->db->query("ALTER TABLE Roles AUTO_INCREMENT=1");

        $rolesBuilder = $this->db->table('Roles');

        $roles = [
            [
                'name' => "admin",
                "created_at" => new Time()
            ],
            [
                'name' => "app_client",
                "created_at" => new Time()
            ]
        ];

        $rolesBuilder->insertBatch($roles);
    }
}

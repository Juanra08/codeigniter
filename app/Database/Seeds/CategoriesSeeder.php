<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;
use Faker\Factory;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('Categories')->where("id > ",0)->delete();
        $this->db->query("ALTER TABLE Categories AUTO_INCREMENT=1");

        $categoriesBuilder = $this->db->table('Categories');

        $categories = [
            [
                'name' => "Rock",
                "created_at" => new Time()
            ],
            [
                'name' => "EDM",
                "created_at" => new Time()
            ]
        ];

        $categoriesBuilder->insertBatch($categories);
    }
}
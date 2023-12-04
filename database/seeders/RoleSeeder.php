<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use Database\Seeders\Role;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //peranan pentadbir
        Role::updateOrCreate(
            [
                'name' => 'pentadbir',
            ],
            [
                'name' => 'pentadbir'
            ]
        );
        //peranan warden
        Role::updateOrCreate(
            [
                'name' => 'warden',
            ],
            [
                'name' => 'warden'
            ]
        );

        //peranan pengawal
        Role::updateOrCreate(
            [
                'name' => 'pengawal',
            ],
            [
                'name' => 'pengawal'
            ]
        );

        //peranan pelajar
        Role::updateOrCreate(
            [
                'name' => 'pelajar',
            ],
            [
                'name' => 'pelajar'
            ]
        );

        //peranan tetamu
        Role::updateOrCreate(
            [
                'name' => 'tetamu',
            ],
            [
                'name' => 'tetamu'
            ]
        );
    }
}

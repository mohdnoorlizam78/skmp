<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\Assign;
// use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //peranan pentadbir
        $role_pentadbir = Role::updateOrCreate(
            [
                'name' => 'pentadbir',
            ],
            [
                'name' => 'pentadbir'
            ]
        );

        //peranan warden
        $role_warden = Role::updateOrCreate(
            [
                'name' => 'warden',
            ],
            [
                'name' => 'warden'
            ]
        );

        //peranan pengawal
        $role_pengawal = Role::updateOrCreate(
            [
                'name' => 'pengawal',
            ],
            [
                'name' => 'pengawal'
            ]
        );

        //peranan pelajar
        $role_pelajar = Role::updateOrCreate(
            [
                'name' => 'pelajar',
            ],
            [
                'name' => 'pelajar'
            ]
        );

        //peranan tetamu
        $role_tetamu = Role::updateOrCreate(
            [
                'name' => 'tetamu',
            ],
            [
                'name' => 'tetamu'
            ]
        );

        //kebenaran akses dashboard
        $permission_dashboard = Permission::updateOrCreate(
            [
                'name' => 'dashboard',
            ],
            ['name' => 'dashboard']
        );

        //kebenaran akses penyelenggaraan
        $permission_penyelenggaraan = Permission::updateOrCreate(
            [
                'name' => 'penyelenggaraan',
            ],
            ['name' => 'penyelenggaraan']
        );
        //kebenaran akses mohon keluar-masuk
        $permission_mohonkeluarmasuk = Permission::updateOrCreate(
            [
                'name' => 'keluarmasuk/mohonkeluar',
            ],
            ['name' => 'keluarmasuk/mohonkeluar']
        );
        //kebenaran akses sah keluar-masuk
        $permission_sahkankeluarmasuk = Permission::updateOrCreate(
            [
                'name' => 'keluarmasuk',
            ],
            ['name' => 'keluarmasuk']
        );

        $role_pentadbir->givePermissionTo($permission_dashboard);
        $role_pentadbir->givePermissionTo($permission_penyelenggaraan);
        $role_warden->givePermissionTo($permission_penyelenggaraan);
        $role_pengawal->givePermissionTo($permission_sahkankeluarmasuk);
        $role_pelajar->givePermissionTo($permission_mohonkeluarmasuk);

        //uji user role dan permission
        // $user = User::find(1);
        // $user2 = User::find(2);
        // $user3 = User::find(3);
        // $user4 = User::find(4);
        // $user->assignRole('pentadbir');
        // $user2->assignRole('pentadbir');
        // $user3->assignRole('warden');
        // $user4->assignRole('pelajar');
    }
}

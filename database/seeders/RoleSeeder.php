<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'admin','guard_name'=>'admin']);
        Role::create(['name'=>'creator','guard_name'=>'admin']);
        Role::create(['name'=>'editor','guard_name'=>'admin']);
        Role::create(['name'=>'destroyer','guard_name'=>'admin']);




    }
}

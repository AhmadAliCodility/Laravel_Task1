<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name'=>'create course','guard_name'=>'admin']);
        Permission::create(['name'=>'edit course','guard_name'=>'admin']);
        Permission::create(['name'=>'delete course','guard_name'=>'admin']);
    }
}

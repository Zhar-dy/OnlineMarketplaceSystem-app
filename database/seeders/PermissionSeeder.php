<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $models = [
            'user',
            'role',
            'permission',
            'category',
            'orders',
            'payment'
        ];

        // get all the basic permissions
        $permissions = [
            'list',
            'create',
            'edit',
            'delete',
            'restore',
            'show',
        ];

        foreach ($models as $model) {
            foreach ($permissions as $permission) {
                Permission::updateOrCreate(['name' => $model . '-' . $permission]);
            }
        }
    }

}

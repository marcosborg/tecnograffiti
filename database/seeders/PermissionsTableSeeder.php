<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'client_create',
            ],
            [
                'id'    => 18,
                'title' => 'client_edit',
            ],
            [
                'id'    => 19,
                'title' => 'client_show',
            ],
            [
                'id'    => 20,
                'title' => 'client_delete',
            ],
            [
                'id'    => 21,
                'title' => 'client_access',
            ],
            [
                'id'    => 22,
                'title' => 'urgency_create',
            ],
            [
                'id'    => 23,
                'title' => 'urgency_edit',
            ],
            [
                'id'    => 24,
                'title' => 'urgency_show',
            ],
            [
                'id'    => 25,
                'title' => 'urgency_delete',
            ],
            [
                'id'    => 26,
                'title' => 'urgency_access',
            ],
            [
                'id'    => 27,
                'title' => 'setting_access',
            ],
            [
                'id'    => 28,
                'title' => 'info_create',
            ],
            [
                'id'    => 29,
                'title' => 'info_edit',
            ],
            [
                'id'    => 30,
                'title' => 'info_show',
            ],
            [
                'id'    => 31,
                'title' => 'info_delete',
            ],
            [
                'id'    => 32,
                'title' => 'info_access',
            ],
            [
                'id'    => 33,
                'title' => 'budget_request_create',
            ],
            [
                'id'    => 34,
                'title' => 'budget_request_edit',
            ],
            [
                'id'    => 35,
                'title' => 'budget_request_show',
            ],
            [
                'id'    => 36,
                'title' => 'budget_request_delete',
            ],
            [
                'id'    => 37,
                'title' => 'budget_request_access',
            ],
            [
                'id'    => 38,
                'title' => 'client_type_create',
            ],
            [
                'id'    => 39,
                'title' => 'client_type_edit',
            ],
            [
                'id'    => 40,
                'title' => 'client_type_show',
            ],
            [
                'id'    => 41,
                'title' => 'client_type_delete',
            ],
            [
                'id'    => 42,
                'title' => 'client_type_access',
            ],
            [
                'id'    => 43,
                'title' => 'surface_type_create',
            ],
            [
                'id'    => 44,
                'title' => 'surface_type_edit',
            ],
            [
                'id'    => 45,
                'title' => 'surface_type_show',
            ],
            [
                'id'    => 46,
                'title' => 'surface_type_delete',
            ],
            [
                'id'    => 47,
                'title' => 'surface_type_access',
            ],
            [
                'id'    => 48,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

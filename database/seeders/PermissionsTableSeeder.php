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
                'title' => 'resume_create',
            ],
            [
                'id'    => 18,
                'title' => 'resume_edit',
            ],
            [
                'id'    => 19,
                'title' => 'resume_show',
            ],
            [
                'id'    => 20,
                'title' => 'resume_delete',
            ],
            [
                'id'    => 21,
                'title' => 'resume_access',
            ],
            [
                'id'    => 22,
                'title' => 'company_create',
            ],
            [
                'id'    => 23,
                'title' => 'company_edit',
            ],
            [
                'id'    => 24,
                'title' => 'company_show',
            ],
            [
                'id'    => 25,
                'title' => 'company_delete',
            ],
            [
                'id'    => 26,
                'title' => 'company_access',
            ],
            [
                'id'    => 27,
                'title' => 'job_create',
            ],
            [
                'id'    => 28,
                'title' => 'job_edit',
            ],
            [
                'id'    => 29,
                'title' => 'job_show',
            ],
            [
                'id'    => 30,
                'title' => 'job_delete',
            ],
            [
                'id'    => 31,
                'title' => 'job_access',
            ],
            [
                'id'    => 32,
                'title' => 'interview_create',
            ],
            [
                'id'    => 33,
                'title' => 'interview_edit',
            ],
            [
                'id'    => 34,
                'title' => 'interview_show',
            ],
            [
                'id'    => 35,
                'title' => 'interview_delete',
            ],
            [
                'id'    => 36,
                'title' => 'interview_access',
            ],
        ];

        Permission::insert($permissions);
    }
}

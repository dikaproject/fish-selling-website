<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'dashboard-view',
            'dashboard-admin-view',
            'dashboard-writer-view',

            'account-management',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',

            'writer-list',
            'writer-create',
            'writer-edit',
            'writer-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'article-management',

            'article-list',
            'article-create',
            'article-edit',
            'article-delete',

            'article-category-list',
            'article-category-create',
            'article-category-edit',
            'article-category-delete',

            'article-tag-list',
            'article-tag-create',
            'article-tag-edit',
            'article-tag-delete',

            'product-management',

            'product-list',
            'product-create',
            'product-edit',
            'product-delete',

            'product-category-list',
            'product-category-create',
            'product-category-edit',
            'product-category-delete',
        ];

        $admin = Role::firstOrCreate(['name' => 'admin']);

        $writer = Role::firstOrCreate(['name' => 'writer']);

        $user = Role::firstOrCreate(['name' => 'user']);

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin->givePermissionTo($permissions);

        $writer->givePermissionTo([
            'dashboard-view',
            'dashboard-writer-view',

            'article-list',
            'article-create',
            'article-edit',
            'article-delete',

            'article-category-list',
            'article-category-create',
            'article-category-edit',
            'article-category-delete',

            'article-tag-list',
            'article-tag-create',
            'article-tag-edit',
            'article-tag-delete',
        ]);

        $user->givePermissionTo([
            'dashboard-view',
        ]);
    }
}

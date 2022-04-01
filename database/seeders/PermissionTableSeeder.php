<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'xem-vai-tro',
            'them-vai-tro',
            'sua-vai-tro',
            'xoa-vai-tro',
            'xem-danh-muc',
            'them-danh-muc',
            'sua-danh-muc',
            'xoa-danh-muc',
            'xem-bai-viet',
            'them-bai-viet',
            'sua-bai-viet',
            'xoa-bai-viet',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}

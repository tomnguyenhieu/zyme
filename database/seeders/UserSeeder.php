<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('ten bang')-><cac lenh query>(); // de ket noi toi bang CSDL
        /**
         * Query builder: thao tac truc tiep toi bang CSDL.
         * Uu diem: toc do nhanh vi thao tac truc tiep toi CSDL.
         * Nhuoc diem: xu ly logic khong manh.
         */
        // Tao 1 admin va 99 editor
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        for ($i = 1; $i < 100; $i++) {
            DB::table('users')->insert([
                'name' => 'editor-' . $i,
                'email' => 'editorEmail' . $i . '@gmail.com',
                /**
                 * Ma hoa mat khau duoi dang SHA
                 * Khoa bi mat la gia tri cua APP_KEY trong env
                 */
                'password' => Hash::make('12345678'),
                'role' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

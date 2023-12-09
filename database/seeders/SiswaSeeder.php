<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        //
        DB::table('siswa')->insert([
            'nama'=>'Argy',
            'nomor_induk'=>'100',
            'alamat'=>'Cirebon',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'nama'=>'Bagas',
            'nomor_induk'=>'101',
            'alamat'=>'Bandung',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'nama'=>'Chandra',
            'nomor_induk'=>'102',
            'alamat'=>'Makassar',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}

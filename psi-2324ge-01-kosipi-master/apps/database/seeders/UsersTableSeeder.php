<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Data admin
        User::create([
            'membership_number' => 'ADM001',
            'username' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'place_of_birth' => 'Jakarta',
            'date_of_birth' => '1990-01-01',
            'address' => 'Jl. Contoh No. 123',
            'phone_number' => '081234567890',
            'institution' => 'Universitas Contoh',
            'work_unit' => 'Departemen Contoh',
            'role' => 'admin',
        ]);

        // Data bendahara
        User::create([
            'membership_number' => 'BEN001',
            'username' => 'bendahara',
            'name' => 'Bendahara',
            'email' => 'bendahara@example.com',
            'password' => Hash::make('password'),
            'place_of_birth' => 'Surabaya',
            'date_of_birth' => '1995-02-15',
            'address' => 'Jl. Contoh No. 456',
            'phone_number' => '081234567891',
            'institution' => 'Institut Contoh',
            'work_unit' => 'Bagian Keuangan',
            'role' => 'bendahara',
        ]);

        // Data anggota 1
        User::create([
            'membership_number' => 'AGT001',
            'username' => 'fritzk',
            'name' => 'Fritz K',
            'email' => 'fritzk@example.com',
            'password' => Hash::make('password'),
            'place_of_birth' => 'Bandung',
            'date_of_birth' => '1995-08-10',
            'address' => 'Jl. Contoh No. 123',
            'phone_number' => '081234567891',
            'institution' => 'Institut Contoh',
            'work_unit' => 'Departemen Contoh',
            'role' => 'anggota',
        ]);

        // Data anggota 2
        User::create([
            'membership_number' => 'AGT002',
            'username' => 'markus',
            'name' => 'Markus R',
            'email' => 'markus@example.com',
            'password' => Hash::make('password'),
            'place_of_birth' => 'Jakarta',
            'date_of_birth' => '1993-05-25',
            'address' => 'Jl. Contoh No. 456',
            'phone_number' => '081234567892',
            'institution' => 'Universitas Contoh',
            'work_unit' => 'Bagian Keuangan',
            'role' => 'anggota',
        ]);

        // Data anggota 3
        User::create([
            'membership_number' => 'AGT003',
            'username' => 'bobby',
            'name' => 'Bobby S',
            'email' => 'bobby@example.com',
            'password' => Hash::make('password'),
            'place_of_birth' => 'Surabaya',
            'date_of_birth' => '1997-03-15',
            'address' => 'Jl. Contoh No. 789',
            'phone_number' => '081234567893',
            'institution' => 'Akademi Contoh',
            'work_unit' => 'Laboratorium',
            'role' => 'anggota',
        ]);

        // Data anggota 4
        User::create([
            'membership_number' => 'AGT004',
            'username' => 'udut',
            'name' => 'Udut T',
            'email' => 'udut@example.com',
            'password' => Hash::make('password'),
            'place_of_birth' => 'Bandung',
            'date_of_birth' => '1998-11-20',
            'address' => 'Jl. Contoh No. 246',
            'phone_number' => '081234567894',
            'institution' => 'Institut Contoh',
            'work_unit' => 'Laboratorium',
            'role' => 'anggota',
        ]);

        // Data anggota 5
        User::create([
            'membership_number' => 'AGT005',
            'username' => 'walker',
            'name' => 'Walker A',
            'email' => 'walker@example.com',
            'password' => Hash::make('password'),
            'place_of_birth' => 'Bandung',
            'date_of_birth' => '1996-09-05',
            'address' => 'Jl. Contoh No. 567',
            'phone_number' => '081234567895',
            'institution' => 'Universitas Contoh',
            'work_unit' => 'Departemen Contoh',
            'role' => 'anggota',
        ]);
    }
}

<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Cek apakah kolom 'email' dan 'name' ada
        if (!isset($row['email']) || !isset($row['name'])) {
            // Berikan logika apa yang harus dilakukan jika tidak ada kolom tersebut
            // Misalnya, skip row ini atau berikan error message
            return null; // skip row
        }

        // Cek apakah pengguna sudah ada
        $user = User::where('email', $row['email'])->first();

        if ($user) {
            // Update jika data berbeda
            $user->update([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => $row['password'] ?? $user->password, // Jaga password yang ada jika tidak diatur
                // tambahkan kolom lainnya sesuai kebutuhan
            ]);
        } else {
            // Buat user baru
            $user = User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => Hash::make('password'), // atur password default
            ]);
        }

        // Tambahkan role_id ke tabel role_user
        // Misalnya, role_id default adalah 2
        $defaultRoleId = 2;

        DB::table('role_user')->updateOrInsert(
            ['user_id' => $user->id, 'role_id' => $defaultRoleId]
        );

        return $user;
    }
}

// namespace App\Imports;

// use App\Models\User;
// use Illuminate\Support\Facades\Hash;
// use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;

// class UsersImport implements ToModel, WithHeadingRow
// {
//     public function model(array $row)
//     {
//         // Cek apakah kolom 'email' ada
//         if (!isset($row['email']) || !isset($row['name'])) {
//             // Berikan logika apa yang harus dilakukan jika tidak ada kolom tersebut
//             // Misalnya, skip row ini atau berikan error message
//             return null; // skip row
//         }

//         $user = User::where('email', $row['email'])->first();

//         if ($user) {
//             // Update jika data berbeda
//             $user->update([
//                 'name' => $row['name'],
//                 'email' => $row['email'],
//                 'password' => $row['password'],
//                 // tambahkan kolom lainnya sesuai kebutuhan
//             ]);
//         } else {
//             // Buat user baru
//             return new User([
//                 'name' => $row['name'],
//                 'email' => $row['email'],
//                 'password' => Hash::make('password'), // atur password default
//             ]);
//         }
//     }
// }

// class UsersImport implements ToModel, WithHeadingRow
// {
//     public function model(array $row)
//     {
//         $user = User::where('email', $row['email'])->first();

//         if ($user) {
//             // Update jika data berbeda
//             $user->update([
//                 'name' => $row['name'],
//                 'email' => $row['email'],
//                 // 'password' => $row['password'],
//                 // tambahkan kolom lainnya sesuai kebutuhan
//             ]);
//         } else {
//             // Buat user baru
//             return new User([
//                 'name' => $row['name'],
//                 'email' => $row['email'],
//                 'password' => Hash::make('defaultpassword'), // atur password default
//             ]);
//         }
//     }
// }

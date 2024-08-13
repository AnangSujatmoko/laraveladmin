<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Cek apakah kolom 'email' ada
        if (!isset($row['email']) || !isset($row['name'])) {
            // Berikan logika apa yang harus dilakukan jika tidak ada kolom tersebut
            // Misalnya, skip row ini atau berikan error message
            return null; // skip row
        }

        $user = User::where('email', $row['email'])->first();

        if ($user) {
            // Update jika data berbeda
            $user->update([
                'name' => $row['name'],
                'email' => $row['email'],
                // tambahkan kolom lainnya sesuai kebutuhan
            ]);
        } else {
            // Buat user baru
            return new User([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => Hash::make('defaultpassword'), // atur password default
            ]);
        }
    }
}

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

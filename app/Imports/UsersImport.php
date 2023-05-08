<?php
namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
        ]);
    }

    /**
     * @return int
     */
    public function headingRow(): int
    {
        return 1; // assuming headers are in the first row
    }

    /**
     * @return array
     */
    public function map(array $row): array
    {
        return [
            'name' => $row['Name'],
            'email' => $row['Email Address'],
            'password' => $row['Password'],
        ];
    }
}

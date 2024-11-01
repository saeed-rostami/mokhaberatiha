<?php

namespace App\Exports;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users = User::query()
            ->where('is_admin' , 0)
            ->get();

        $data = [];
        foreach ( $users as $user) {
            $resource = [
                'id' => $user->id,
                'mobile' => $user->mobile,
                'email' => $user->email,
                'city' => $user->city?->name ?? "ثبت نشده",
                'created_at' => verta($user->created_at)->format('Y-m-d'),
            ];
            $data[] = $resource;
        }
        return new Collection($data);
    }

    public function headings(): array
    {
        return [
            "ID",
            "mobile",
            "email",
            "city",
            "created_at"
        ];
    }
}

<?php

namespace App\Imports;

use App\Models\Thematique;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ThematiqueImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Thematique([
            'nom' => $row['nom'],
            'valeur' => $row['valeur']
        ]);
    }
}

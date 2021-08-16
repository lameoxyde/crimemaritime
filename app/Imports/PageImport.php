<?php

namespace App\Imports;

use App\Models\Page;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;


class PageImport implements ToModel, WithCustomCsvSettings
{

    private $delimiter;

    public function __construct($delimiter){
        $this->delimiter = $delimiter;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new Page([
            'numero' => $row[0],
            'flag' => $row[1],
            'nom' => $row[2],
            'thematique_id' => $row[3],
            'date' => date("Y-m-d", strtotime(str_replace('/', '-',$row[4]))),
            'objet' => $row[5],
            'lieu' => $row[6],
            'latitude' => $row[7],
            'longitude' => $row[8],
            'description' => str_replace(';',',',$row[9]),
            

        ]);

    }

    public function getCsvSettings(): array{
        return [
            'delimiter'=> $this->delimiter,
            'input_encoding' => 'ISO-8859-1'
        ];
    }
}

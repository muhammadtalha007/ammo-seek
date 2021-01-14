<?php

namespace services;

use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CSVModal implements ToCollection
{
    private $data = [];

    public function collection(Collection $rows)
    {
        $count = 0;
        foreach ($rows as $row) {

            if ($count > 0){
                if (!empty($row[0])) {
                    array_push($this->data, [
                        "unique_id" => $row[0],
                        "ammo_type" => $row[1],
                        "retailer_id" => $row[2],
                        "caliber_id" => $row[3],
                        "price" => $row[4],
                        "mfg" => $row[5],
                        "description" => $row[6],
                        "condition" => $row[7],
                        "case_material" => $row[8],
                        "shipping" => $row[9],
                        "rounds" => $row[10],
                        "grain_weight" => $row[11],
                        "ammo_external_weight" => $row[12],
                        "gauge" => $row[13],
                        "shot_type" => $row[14],
                        "shell_length" => $row[15],
                    ]);
                }
            }
            $count++;

        }
    }

    public function getData()
    {
        return $this->data;
    }
}

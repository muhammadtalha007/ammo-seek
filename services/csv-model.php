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
                        "ammo_type" => $row[0],
                        "retailer" => $row[1],
                        "caliber" => $row[2],
                        "price" => $row[3],
                        "mfg" => $row[4],
                        "description" => $row[5],
                        "condition" => $row[6],
                        "case_material" => $row[7],
                        "shipping" => $row[8],
                        "rounds" => $row[9],
                        "grain_weight" => $row[10],
                        "ammo_external_weight" => $row[11],
                        "gauge" => $row[12],
                        "shot_type" => $row[13],
                        "shell_length" => $row[14],
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

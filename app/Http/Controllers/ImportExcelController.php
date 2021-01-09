<?php

namespace App\Http\Controllers;

use App\Ammo;
use App\Customer;
use App\Passwords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use services\CSVModal;

class ImportExcelController extends Controller
{
    function import(Request $request)
    {
        $csvModal = new CSVModal();
        \Excel::import($csvModal, request()->file('select_file'));
        $dataList = $csvModal->getData();
        foreach ($dataList as $data) {
//            $count++;
                $ammo = new Ammo();
                $ammo->ammo_type = $data['ammo_type'];
//            if ($data['ammo_type'] == 'Shotgun' || $data['ammo_type'] == 'shotgun') {
                $ammo->gauge = $data['gauge'];
                $ammo->shot_type = $data['shot_type'];
                $ammo->shell_length = $data['shell_length'];
//            }
                $ammo->retailer = $data['retailer'];
                $ammo->caliber = $data['caliber'];
                $ammo->price = $data['price'];
                $ammo->mfg = $data['mfg'];
                $ammo->description = $data['description'];
                $ammo->condition = $data['condition'];
                $ammo->case_material = $data['case_material'];
                $ammo->shipping = $data['shipping'];
                $ammo->rounds = $data['rounds'];
                $ammo->grain_weight = $data['grain_weight'];
                $ammo->ammo_external_link = $data['ammo_external_weight'];
                $ammo->save();
        }
        return json_encode(['status' => true, 'message' => 'Excel Data Imported successfully.']);
    }
}

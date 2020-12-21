<?php

namespace App\Http\Controllers;

use App\Customer;
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
            $customer = new Customer();
            $customer->number = $data['number'];
            $customer->save();
        }
        return json_encode(['status' => true, 'message' => 'Excel Data Imported successfully.']);
    }
}

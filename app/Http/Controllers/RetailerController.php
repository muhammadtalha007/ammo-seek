<?php

namespace App\Http\Controllers;

use App\Retailer;
use Illuminate\Http\Request;

class RetailerController extends Controller
{
    public function saveRetailerData(Request $request)
    {
        try {
            $retailer = new Retailer();
            $retailer->name = $request->name;
            $retailer->save();
            return redirect('retailer');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function deleteRetailer($id)
    {
        Retailer::where('id', $id)->first()->delete();
        return redirect()->back();
    }
}

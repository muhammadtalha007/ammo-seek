<?php

namespace App\Http\Controllers;

use App\Caliber;
use Illuminate\Http\Request;

class CaliberController extends Controller
{
    public function saveCaliberData(Request $request)
    {
        try {
            $caliber = new Caliber();
            $caliber->name = $request->name;
            $caliber->save();
            return redirect('caliber');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function deleteCaliber($id)
    {
        Caliber::where('id', $id)->first()->delete();
        return redirect()->back();
    }
}

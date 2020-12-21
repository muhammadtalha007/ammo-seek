<?php

namespace App\Http\Controllers;

use App\Ammo;
use App\AmmoFavourites;
use App\Caliber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AmmoController extends Controller
{
    public function saveAmmoData(Request $request)
    {
        $ammo = new Ammo();
        $ammo->ammo_type = $request->ammoType;
        if ($request->ammoType == 'Shotgun') {
            $ammo->gauge = $request->gauge;
            $ammo->shot_type = $request->shotType;
            $ammo->shell_length = $request->shellLength;
        }
        $ammo->retailer = $request->retailer;
        $ammo->caliber = $request->caliber;
        $ammo->price = $request->price;
        $ammo->mfg = $request->mfg;
        $ammo->description = $request->description;
        $ammo->condition = $request->condition;
        $ammo->case_material = $request->caseMaterial;
        $ammo->shipping = $request->shipping;
        $ammo->rounds = $request->rounds;
        $ammo->grain_weight = $request->grainWeight;
        $ammo->ammo_external_link = $request->externalLink;
        $ammo->save();
        return redirect('ammo');
    }

    public function deleteAmmo($id)
    {
        Ammo::where('id', $id)->first()->delete();
        return redirect()->back();
    }

    public function searchAmmo(Request $request)
    {
        $caliber = Caliber::all();
        return json_encode($caliber);
    }

    public function seekByCaliber(Request $request)
    {
        $caliberId = Caliber::where('name', $request->myCountry)->first()['id'];
        $ammoList = Ammo::where('caliber', $caliberId)->get();
        return view('ammo-detail')->with(['ammoList' => $ammoList]);
    }

    public function seekByHandgun(Request $request)
    {
        $ammos = Ammo::where('ammo_type', 'Handgun');
        if (!empty($request->handgunCaliber)) {
            $ammos->where('caliber', $request->handgunCaliber);
        }
        if (!empty($request->handgunRetailer)) {
            $ammos->where('retailer', $request->handgunRetailer);
        }
        if (!empty($request->handgunGrainWeight)) {
            $ammos->where('grain_weight', $request->handgunGrainWeight);
        }
        if (!empty($request->handgunRounds)) {
            $ammos->where('rounds', $request->handgunRounds);
        }
        if (!empty($request->handgunCondition)) {
            $ammos->where('condition', $request->handgunCondition);
        }
        if (!empty($request->handgunCaseMaterial)) {
            $ammos->where('case_material', $request->handgunCaseMaterial);
        }
        if (!empty($request->handgunShipping)) {
            $ammos->where('shipping', $request->handgunShipping);
        }
        $ammoList = $ammos->get();
        return view('ammo-detail')->with(['ammoList' => $ammoList]);
    }

    public function seekByRifle(Request $request)
    {
        $ammos = Ammo::where('ammo_type', 'Rifle');
        if (!empty($request->rifleCaliber)) {
            $ammos->where('caliber', $request->rifleCaliber);
        }
        if (!empty($request->rifleRetailer)) {
            $ammos->where('retailer', $request->rifleRetailer);
        }
        if (!empty($request->rifleGrainWeight)) {
            $ammos->where('grain_weight', $request->rifleGrainWeight);
        }
        if (!empty($request->rifleRounds)) {
            $ammos->where('rounds', $request->rifleRounds);
        }
        if (!empty($request->rifleCondition)) {
            $ammos->where('condition', $request->rifleCondition);
        }
        if (!empty($request->rifleCaseMaterial)) {
            $ammos->where('case_material', $request->rifleCaseMaterial);
        }
        if (!empty($request->rifleShipping)) {
            $ammos->where('shipping', $request->rifleShipping);
        }
        $ammoList = $ammos->get();
        return view('ammo-detail')->with(['ammoList' => $ammoList]);
    }

    public function seekByRimfire(Request $request)
    {
        $ammos = Ammo::where('ammo_type', 'Rimfire');
        if (!empty($request->rimfireCaliber)) {
            $ammos->where('caliber', $request->rimfireCaliber);
        }
        if (!empty($request->rimfireRetailer)) {
            $ammos->where('retailer', $request->rimfireRetailer);
        }
        if (!empty($request->rimfireGrainWeight)) {
            $ammos->where('grain_weight', $request->rimfireGrainWeight);
        }
        if (!empty($request->rimfireRounds)) {
            $ammos->where('rounds', $request->rimfireRounds);
        }
        if (!empty($request->rimfireCondition)) {
            $ammos->where('condition', $request->rimfireCondition);
        }
        if (!empty($request->rimfireCaseMaterial)) {
            $ammos->where('case_material', $request->rimfireCaseMaterial);
        }
        if (!empty($request->rimfireShipping)) {
            $ammos->where('shipping', $request->rimfireShipping);
        }
        $ammoList = $ammos->get();
        return view('ammo-detail')->with(['ammoList' => $ammoList]);
    }

    public function seekByShotgun(Request $request)
    {
        $ammos = Ammo::where('ammo_type', 'Shotgun');
        if (!empty($request->shotgunGauge)) {
            $ammos->where('gauge', $request->shotgunGauge);
        }
        if (!empty($request->shotgunRetailer)) {
            $ammos->where('retailer', $request->shotgunRetailer);
        }
        if (!empty($request->shotgunShotType)) {
            $ammos->where('shot_type', $request->shotgunShotType);
        }
        if (!empty($request->shotgunShellLength)) {
            $ammos->where('shell_length', $request->shotgunShellLength);
        }
        if (!empty($request->shotgunRounds)) {
            $ammos->where('rounds', $request->shotgunRounds);
        }
        if (!empty($request->shotgunShipping)) {
            $ammos->where('shipping', $request->shotgunShipping);
        }
        $ammoList = $ammos->get();
        return view('ammo-detail')->with(['ammoList' => $ammoList]);
    }

    public function addAmmoFavourite(Request $request)
    {
        if (AmmoFavourites::where(['customer_id' => Session::get('userId'), 'ammo_id' => $request->ammoId])->exists()) {
            return json_encode(['status' => true]);
        }
        $ammoFav = new AmmoFavourites();
        $ammoFav->customer_id = Session::get('userId');
        $ammoFav->ammo_id = $request->ammoId;
        $ammoFav->save();
        return json_encode(['status' => true]);
    }

    public function showFavourite()
    {
        $ammos = [];
        $ammoFav = AmmoFavourites::where('customer_id', Session::get('userId'))->get();
        foreach ($ammoFav as $item) {
            array_push($ammos, Ammo::where('id', $item->ammo_id)->first());
        }
        return view('favourites')->with(['ammos' => $ammos]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Ammo;
use App\Retailer;
use App\RetailerRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RetailerController extends Controller
{
    public function saveRetailerData(Request $request)
    {
        try {
            $retailer = new Retailer();
            $retailer->name = $request->name;
            $retailer->link = $request->link;
            $retailer->save();
            $retailer = Retailer::where('id', $retailer->id)->first();
            $retailer->secret_link = url('/retailer-route') . "?id=" .$retailer->id;
            $retailer->update();
            return redirect('retailer');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function retailerData(Request  $request){
        $request->id = base64_decode($request->id);
        if (empty($request->id)){
            return json_encode("Access Denied.");
        }
        $retailer = Retailer::where('id', $request->id)->first();
        $ammo = Ammo::where('retailer', $request->id)->get();
        return view('retailer-view')->with(['retailer' => $retailer, 'ammoList' => $ammo]);
    }

    public function deleteRetailer($id)
    {
        Retailer::where('id', $id)->first()->delete();
        return redirect()->back();
    }

    public function reviews(Request $request){
        $retailers = Retailer::all();
        if (empty($request->retailer)){
            $request->retailer = $retailers[0]['id'];
            return redirect('retailer-reviews?retailer=' . $retailers[0]['id']);
        }

        $currentRetailer = Retailer::where('id', $request->retailer)->first();
        $currentRetailerReviews = RetailerRating::where('retailer_id',  $request->retailer)->get();
        $currentRetailerReviewsOverall = 0;
        foreach ($currentRetailerReviews as $item){
            $currentRetailerReviewsOverall += (int)$item->rating;
        }
        if ( count($currentRetailerReviews) > 0){
            $currentRetailerReviewsOverall =  $currentRetailerReviewsOverall / count($currentRetailerReviews);
            $currentRetailerReviewsOverall =  round($currentRetailerReviewsOverall,0);
        }
        return view('retailer-reviews')->with(['retailers' => $retailers,'currentRetailerReviews' => $currentRetailerReviews,'retailerId' => $request->retailer,'currentRetailer' => $currentRetailer, 'currentRetailerReviewsOverall' => $currentRetailerReviewsOverall]);
    }

    public function saveReviews(Request $request){
        $review = new RetailerRating();
        $review->rating = $request->rate;
        $review->heading = $request->heading;
        $review->comment = $request->comment;
        $review->user_id = Session::get('userId');
        $review->retailer_id = $request->retailerId;
        $review->save();
        return redirect()->back()->with('message', 'Review Saved Successfully!');
    }
}

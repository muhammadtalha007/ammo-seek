<?php

namespace App\Http\Controllers;

use App\ContactUs;
use App\Http\Controllers\Controller;
use App\SubscribedUser;
use App\TrackAmmoClick;
use App\TrackRetailerClick;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function get(Request $request)
    {
        $user_id = $request->get("uid", 0);
        $user = User::find($user_id);
        return $user;
    }

    public function blockUser($id)
    {
        $user = User::where('id', $id)->first();
        $user->status = '1';
        $user->update();
        return redirect('users');
    }

    public function unblockUser($id)
    {
        $user = User::where('id', $id)->first();
        $user->status = '0';
        $user->update();
        return redirect('users');
    }

    public function userSubscribed(Request $request)
    {
        if (!SubscribedUser::where('email', $request->subscribeEmail)->exists()) {
            $subscribedUser = new SubscribedUser();
            $subscribedUser->email = $request->subscribeEmail;
            $subscribedUser->save();
            session()->flash('msg', 'Subscribed Successfully!');
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors(['You have already Subscribed!']);
        }
    }

    public function contactUs(Request $request)
    {
        $contactUs = new ContactUs();
        $contactUs->name = $request->name;
        $contactUs->email = $request->email;
        $contactUs->phone_no = $request->phoneNo;
        $contactUs->problem = $request->problems;
        $contactUs->save();
        session()->flash('msg', 'Message Sent!');
        return redirect()->back();
    }

    public function recordClick(Request $request)
    {
        $trackAmmoClick = new TrackAmmoClick();
        if(!empty(Session::get('userId')))
        {
            $trackAmmoClick->user_id = Session::get('userId');
        }
        $trackAmmoClick->ammo_id = $request->ammoId;
        $trackAmmoClick->save();
    }

    public function recordRetailerClick(Request $request)
    {
        $trackRetailerClick = new TrackRetailerClick();
        if(!empty(Session::get('userId')))
        {
            $trackRetailerClick->user_id = Session::get('userId');
        }
        $trackRetailerClick->retailer_id = $request->retailerId;
        $trackRetailerClick->save();
    }
}

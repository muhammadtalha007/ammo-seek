<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class CustomerController extends Controller
{
    public function getCustomerListView()
    {
        $customer = Customer::all();
        return view('customer')->with(['customer' => $customer]);
    }

    public function getAddCustomerView()
    {
        return view('add-customer');
    }

    public function saveCustomer(Request $request)
    {
        if($request->checker == 'default')
        {
            $customer = new Customer();
            $customer->email = $request->email;
            $customer->number = $request->number;
            $result = $customer->save();
            if ($result == true) {
                return redirect('customer')->with('message', "Customer Saved Successfully");
            } else {
                return redirect()->back()->with('message', $result);
            }
        }else{
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_number = getenv("TWILIO_NUMBER");
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($request->number,
                ['from' => $twilio_number, 'body' => $request->messageTemplate] );

            $customer = new Customer();
            $customer->email = $request->email;
            $customer->number = $request->number;
            $result = $customer->save();
            if ($result == true) {
                return redirect('customer')->with('message', "Customer Saved Successfully");
            } else {
                return redirect()->back()->with('message', $result);
            }
        }
    }

    public function deleteCustomer($customerId)
    {
        Customer::where('id', $customerId)->delete();
        return redirect()->back();
    }

    public function editCustomer($staffId)
    {
        $customer = Customer::where('id', $staffId)->first();
        return view('edit-customer')->with(['customer' => $customer]);
    }

    public function saveEditedCustomer(Request $request)
    {
        $customer = Customer::where('id', $request->customerId)->first();
        $customer->email = $request->email;
        $customer->number = $request->number;
        $result = $customer->update();
        if ($result == true) {
            return redirect('customer')->with('message', "Customer updated Successfully");
        } else {
            return redirect()->back()->with('message', $result);
        }
    }
}

<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\DeliveryPolicy;
use Illuminate\Http\Request;

class DeliveryPolicyController extends Controller
{
    public function index()
    {
        $delivery_Policies = DeliveryPolicy::get();

        return view('site.delivery_policy.index',compact('delivery_Policies'));
    }
}

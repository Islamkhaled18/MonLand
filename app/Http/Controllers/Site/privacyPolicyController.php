<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\privacyPolicy;
use Illuminate\Http\Request;

class privacyPolicyController extends Controller
{
    public function index()
    {
        $privacyPolicies = privacyPolicy::get();

        return view('site.privacyPolicies.index',compact('privacyPolicies'));
    }
}

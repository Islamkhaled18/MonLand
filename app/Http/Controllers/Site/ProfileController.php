<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\City;
use App\Models\Governorate;
use App\Models\Order;
use App\Models\User;
use App\Models\Vendor;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile($id)
    {
        $profile = User::where('id', auth()->user()->id)->get();
        $addresses = Address::where('user_id', auth()->user()->id)->get();
        $favProducts =  auth()->user()->wishlist()->latest()->get();

        $orders = Order::where('user_id',Auth::id())->get();


        return view('site.profile.profile', compact('profile', 'addresses', 'favProducts','orders'));
    } //end of profile

    public function updateprofile(Request $request, $id)
    {

        $this->validate($request, [

            'firstName' => 'max:255',
            'lastName' => 'max:255',
            'email' => 'email|unique:users,email,' . $id,
            'phone' => 'required',
        ]);

        $profile = User::findOrFail($id);
        $profile->update($request->all());

        Toastr()->success('تم التعديل على بياناتك الشخصيه بنجاح');
        return redirect()->route('site.profile', auth()->user()->id);
    } //end of update


    public function updateprofilePassword(Request $request, $id)
    {
        $this->validate($request, [

            'old_password' => ['required', new MatchOldPassword],
            'password' => ['required'],
        ]);

        $profile = User::findOrFail($id);
        $profile->update(['password' => bcrypt($request->password)]);

        return redirect()->route('site.profile', auth()->user()->id);
    } //end of update user password



    public function addAddress($id)
    {

        $user = User::where('id', auth()->user()->id)->get();
        $governorates = Governorate::where('parent_id', null)->get();
        // $cities = City::all();
        return view('site.profile.add_address', compact('user', 'governorates'));
    } //end of addAddress page


    public function getcity($id)
    {
        $list_cities = Governorate::where("parent_id", $id)->Where('parent_id', '!=', null)->pluck("name", "id");

        return $list_cities;
    }

    public function storeAddress(Request $request, $id)
    {

        $this->validate($request, [

            'Phone_2' => 'nullable|max:255',
            'postal_code' => 'nullable|integer|max:255',
            'address_details' => 'nullable',
            'governorate_id' => 'nullable|integer',
            'city_id' => 'nullable|integer',
            'building_no' => 'nullable|integer',
            'flat_no' => 'nullable|integer',
            'apartment_no' => 'nullable|integer',
            'special_mark' => 'nullable|max:255',
        ]);


        $address = new Address();
        $address->user_id = auth()->user()->id;
        $address->Phone_2 = $request->Phone_2;
        $address->postal_code = $request->postal_code;
        $address->address_details = $request->address_details;
        $address->governorate_id = $request->governorate_id;
        $address->city_id = $request->city_id;
        $address->building_no = $request->building_no;
        $address->flat_no = $request->flat_no;
        $address->apartment_no = $request->apartment_no;
        $address->special_mark = $request->special_mark;
        $address->save();

        return redirect()->route('site.profile', auth()->user()->id);
    }

    public function destroyAddress($id)
    {

        $address = Address::findOrFail($id);
        $address->delete();
        return redirect()->route('site.profile', auth()->user()->id);
    } //end of destroy



   

}

<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Governorate;
use App\Models\Order;
use App\Models\User;
use App\Models\Wishlist;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function getProfile($firstName)
    {
        $profile = User::where('firstName', auth()->user()->firstName)->get();
        $addresses = Address::where('user_id', auth()->user()->id)->get();
        $favProducts = Wishlist::with('products')->where('uuid', $this->getCartId())
            ->orWhere('user_id', Auth::id())->get();

        $orders = Order::where('user_id', Auth::id())->get();

        return view('site.profile.profile', compact('profile', 'addresses', 'favProducts', 'orders'));
    } //end of profile

    public function updateProfile(Request $request, $id)
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

            'Phone_2' => 'required|numeric|digits:11',
            'postal_code' => 'nullable|numeric|digits:5',
            'address_details' => 'required|string|max:250',
            'governorate_id' => 'required|integer|exists:governorates,id',
            'city_id' => 'required|integer|exists:governorates,id',
            'building_no' => 'required|integer|max:3',
            'flat_no' => 'required|integer|max:3',
            'apartment_no' => 'required|integer|max:3',
            'special_mark' => 'required|string|max:250',
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

    public function setDefaultAddress(Request $request)
    {
        $addressId = $request->input('addressId');

        // Retrieve the address by ID
        $address = Address::find($addressId);

        if (!$address) {
            return response()->json(['error' => 'Address not found'], 404);
        }

        $userId = $address->user_id;

        // Set all addresses belonging to the user as non-default
        Address::where('user_id', $userId)->update(['is_default' => 0]);

        // Set the selected address as default
        $address->is_default = 1;
        $address->save();

        return response()->json(['success' => 'Default address set successfully']);
    }

    public function destroyAddress($id)
    {

        $address = Address::findOrFail($id);
        $address->delete();
        return redirect()->route('site.profile', auth()->user()->id);
    } //end of destroy

    protected function getCartId()
    {
        $id = request()->cookie('favorite_uuid');
        if (!$id) {
            $id = Str::uuid();
            Cookie::queue('cart_id', $id, 60 * 24 * 7);
        }

        return $id;
    }

}

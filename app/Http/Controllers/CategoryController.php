<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\User;
use App\Models\Donation_form;
use Auth;



class CategoryController extends Controller
{


    public function index()
    {
        $data= Category::all();
        return view('dashboardbage.Categories')->with('data', $data);
    }


    // public function inCategory()
    // {
    //     $data= Category::all();

    //     $donationData = Donation::all();
    //     $userId = Auth::id();
    //     $user = User::find($userId);
    //     $DonationForms = Donation_form::where('showdonation', 'yes')->orderByDesc('price')->take(3)->get();

    //     $userIds = $DonationForms->pluck('user_id')->unique()->toArray();
    //     $donationIds = $DonationForms->pluck('donation_id')->unique()->toArray();

    //     $users = User::whereIn('id', $userIds)->get();
    //     $donations = Donation::whereIn('id', $donationIds)->get();



    //     // return view('userDonation', compact('DonationForms', 'users', 'donations'));
    //     return view('Home.index', [
    //         'category' => $data,
    //         'donation' => $donationData,
    //         'user'=>$user,
    //         'DonationForms'=>$DonationForms,
    //         'users'=>$users,
    //         'donations'=>$donations
    //     ]);
    // }


    public function inCategory()
    {
        $data= Category::all();

        $donationData = Donation::all();
        $userId = Auth::id();
        $user = User::find($userId);
        $DonationForms = Donation_form::orderByDesc('price')->take(3)->get();

        $userIds = $DonationForms->pluck('user_id')->unique()->toArray();
        $donationIds = $DonationForms->pluck('donation_id')->unique()->toArray();

        $users = User::whereIn('id', $userIds)->get();
        $donations = Donation::whereIn('id', $donationIds)->get();



        // return view('userDonation', compact('DonationForms', 'users', 'donations'));
        return view('Home.index', [
            'category' => $data,
            'donation' => $donationData,
            'user'=>$user,
            'DonationForms'=>$DonationForms,
            'users'=>$users,
            'donations'=>$donations
        ]);
    }

    public function create()
    {
        return view('dashboardbage.createcategory');
    }

    public function aboutus(){
        $userId = Auth::id();
        $user = User::find($userId);
        return view('aboutus.aboutus',compact('user'));
    }

    public function contactus(){
        $userId = Auth::id();
        $user = User::find($userId);
        return view('Contact.contactus',compact('user'));
    }



     public function store(StoreCategoryRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,jfif|max:2048',


        ]);

        $filename = '';
        if ($request->hasFile('image')) {
            $filename = $request->getSchemeAndHttpHost() . '/assets/img/' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('/assets/img/'), $filename);
        }

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $filename,
        ]);

        return redirect('category')->with('flash_message', 'Category Added!');
     }



    public function edit($id)
    {
        $data=Category::find($id);
        return view('dashboardbage.editcategory')->with('data',$data);
    }



    public function update(UpdateCategoryRequest $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,jfif|max:2048',
        ]);

        $data['name'] = $request->name;
        $data['description'] = $request->description;

        $filename = '';

        if ($request->hasFile('image')) {
            $filename = $request->getSchemeAndHttpHost() . '/assets/img/' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('/assets/img/'), $filename);
            $data['image'] = $filename;
        } else {
            unset($data['image']);
        }


        Category::where(['id' => $id])->update($data);
        return redirect('category')->with('flash_message','Category Update!');

    }

    public function destroy($id)
    {

    Category::destroy($id);
    return redirect('category')->with('flash_message','Category deleted!');

    }

}

<?php

namespace App\Http\Controllers;

use App\Services\Impl\ProfileServiceImpl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    protected $serviceProfile;

    public function __construct(ProfileServiceImpl $profileServiceImpl)
    {
        $this->serviceProfile = $profileServiceImpl;
    }

    public function index()
    {
        $profiles = $this->serviceProfile->getAll();
        return view('profiles.list',compact('profiles'));
    }
    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        $this->serviceProfile->create($request);
        Session::flash('success','Tao thanh cong');
        return redirect()->route('profiles.list');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $profile = $this->serviceProfile->findById($id);
        return view('profiles.edit',compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $this->serviceProfile->update($request,$id);
        Session::flash('success','Sua thanh cong');

        return redirect()->route('profiles.list');
    }


    public function destroy($id)
    {
        $this->serviceProfile->destroy($id);
        Session::flash('success','Xoa thanh cong');
        return redirect()->route('profiles.list');
    }
}

<?php


namespace App\Services\Impl;


use App\Profile;
use App\Repositories\Impl\ProfileRepositoryImpl;
use App\Repositories\ProfileRepositoryInterface;
use App\Services\ProfileServicesInterface;
use Illuminate\Support\Facades\Storage;

class ProfileServiceImpl implements ProfileServicesInterface
{
    protected $repositoryProfile;

    public function __construct(ProfileRepositoryInterface $repositoryProfile)
    {
        $this->repositoryProfile = $repositoryProfile;
    }

    public function getAll()
    {
        return $this->repositoryProfile->getAll();
    }

    public function findById($id)
    {
        return  $this->repositoryProfile->findById($id);
    }

    public function create($request)
    {
        $profile = new Profile();
        $profile->name = $request->name;
        $profile->phone = $request->phone;
        $profile->gender = $request->gender;
        $profile->address = $request->address;
        $profile->birthday = $request->birthday;
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $profile->image = $path;
        }
        $this->repositoryProfile->create($profile);
    }

    public function update($request, $id)
    {
        $profile = $this->repositoryProfile->findById($id);
        $profile->name = $request->name;
        $profile->phone = $request->phone;
        $profile->gender = $request->gender;
        $profile->address = $request->address;
        $profile->birthday = $request->birthday;
        if ($request->hasFile('image')) {
            $currentImg = $profile->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $profile->image = $path;
        }

        $this->repositoryProfile->update($profile);

    }

    public function destroy($id)
    {
        $profile = $this->repositoryProfile->findById($id);
        $image = $profile->image;
        if ($image){
            Storage::delete('/public/'.$image);
        }
        $this->repositoryProfile->destroy($profile);
    }
}

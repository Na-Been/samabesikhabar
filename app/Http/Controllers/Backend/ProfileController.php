<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repo\UserRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * @var UserRepo
     */
    private $userRepo;

    /**
     * ProfileController constructor.
     */
    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $user = $this->userRepo->findById($id);
        return view('backend.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'nick_name' => 'required',
            'display_name' => 'required',
            'user_name' => 'required|unique:users,user_name,' . \auth()->id(),
            'email' => 'required|unique:users,email,' . \auth()->id(),
            'avatar.*' => 'max:4320|mimes:jpeg,png,jpg,gif,svg,bmp,tif,tiff,eps,webp,PNG',
        ]);
        if ($request->password != null) {
            $request->validate([
                'password' => 'required|min:8|confirmed',
            ]);
        }
        try {
            $id = Auth::id();
            if ($request->file('avatar')) {
                $data['avatar'] = $this->userRepo->storeOrUpdateImage($request);
            }
            $user = $this->userRepo->findById($id);
            if ($request->password != null) {
                $data['password'] = bcrypt($request->password);
            } else {
                $data['password'] = $user->password;
            }
            $update = $user->update($data);
            if ($update) {
                session()->flash('success', 'Profile Successfully updated!');
                return back();
            } else {
                session()->flash('error', 'Profile could not be update!');
                return back();
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION:' . $exception);
            return back();
        }
    }
}

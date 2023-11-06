<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function delete($id) {
        
        $user = User::find($id);
    
        if ($user) {
            $user->delete();
            Alert::success('Success', 'user deleted successfully.');
        } else {
            
            Alert::error('Error Message', 'Something went wrong');
        }
        return redirect()->route('admin.home');
    }
    //

    public function profile(Request $request,$id)
    {
       // $id = Auth::id();
        $user = User::find($id);
        return view('recommendor.profile.profile', ['user' => $user]);   
    }
    public function AdminProfile(Request $request,$id)
    {
       // $id = Auth::id();
        $user = User::find($id);
        return view('admin.profile.profile', ['user' => $user]);   
    }
    public function edit(Request $request)
    {
        $user = Auth::user();

      

        // Update name and address
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->email = $request->input('email');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
    
            // Define the path to the directory
            $path = public_path('images/');
    
            // Check if the directory exists, if not, create it
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
    
            // Save the image in the specified directory
            Image::make($image)->resize(800, 400)->save($path . $filename);
    
            $user['image'] = $filename;
        }

        $user->save();
        Alert::success('Success', 'profile updated successfully.');
        if(Auth::user()->role == "recommender"){
        return redirect()->route('recommender.profile',['id' => $user->id]);
        } elseif(Auth::user()->role == "admin"){
            return redirect()->route('admin.profile',['id' => $user->id]);
        }
    }
    public function changePassword(Request $request)
    {
       

        $user = Auth::user();

        if (password_verify($request->current_password, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
            Alert::success('Success', 'password updated successfully.');

            if(Auth::user()->role == "recommender"){
                return redirect()->route('recommender.profile',['id' => $user->id]);
                } elseif(Auth::user()->role == "admin"){
                    return redirect()->route('admin.profile',['id' => $user->id]);
                }
        } else {
            Alert::error('Error', 'Failed.');
            if(Auth::user()->role == "recommender"){
                return redirect()->route('recommender.profile',['id' => $user->id]);
                } elseif(Auth::user()->role == "admin"){
                    return redirect()->route('admin.profile',['id' => $user->id]);
                }
        }
    }
                        
}

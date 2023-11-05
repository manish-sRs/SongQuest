<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
}

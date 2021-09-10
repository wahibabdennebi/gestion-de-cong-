<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function show()
    {
        $users=User::all();  
        return view('role_user',compact('users'));
    }
    public function admin(Request $request){
        $users = User::Where('id',$request->iduser)->first();;
        $result= array();
        $users->role='admin';
        
        if ($users->save()) {
            $success = true;
            $message = "User deleted successfully";
        } else {
            $success = true;
            $message = "User not found";
        }
        array_push($result,$users);
        return response()->json([$result,
        'success' => $success,
        'message' => $message,
        ]);
        
       
    }
    public function user(Request $request){
        $users = User::Where('id',$request->iduser)->first();;
        $result= array();
        $users->role='user';
        
        if ($users->save()) {
            $success = true;
            $message = "User deleted successfully";
        } else {
            $success = true;
            $message = "User not found";
        }
        array_push($result,$users);
        return response()->json([$result,
        'success' => $success,
        'message' => $message,
        ]);
        
       
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class SoldeCongeController extends Controller
{
     public function GetAllUsers()
    {
        $users =User::all();
       
        return view('solde')->with ('users',$users);
    }
    public function updateSoldeConge(Request $request){
      
        $this->validate($request,[
            'leave_balance' => 'required',   
            ]);
            $users = User::find($request->id);
            $users->leave_balance =$request->leave_balance;
            $users->save();
            return redirect ('/soldeconge')->with('success',' updated');
        }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Parametre;
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
        public function updateRateSolde(Request $request){
            $parametre= Parametre::all();
           // dd( $parametre);
            if($parametre->isEmpty()) {
                dd('EMPTY');
                $parametre= new Parametre;
                $parametre->rate_leave_balance	=$request->input ('rate_leave_balance');
                $parametre->save();
                return redirect ('/soldeconge')->with('success',' updated');
            }else{
                $parametre= Parametre::all()->first();
                $parametre->rate_leave_balance=$request->rate_leave_balance;
                $parametre->save();
                return redirect ('/soldeconge')->with('success',' updated');
            }
            
        }
}

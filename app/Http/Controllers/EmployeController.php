<?php

namespace App\Http\Controllers;
use App\Equipe;
use App\User;
use App\EquipeUser;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function show()
    {
        $equipes =Equipe::all();
        $users=User::all();
        return view('employés',compact('users','equipes'));
    }
    public function store(Request $request){

        $this->validate($request,[
        'name' => 'required',
        ]);
        $equipes=new Equipe;
        $equipes->name =$request->input ('name');

        $equipes->save();
        return redirect ('employeurl')->with('success','Equipe Added');
        }

        public function destroy(Request $request)
        {
            $equipes = Equipe::find($request->id);
            $equipes->delete();
            return redirect ('employeurl')->with('success','Equipes successfully deleted!');
        }

        public function adduser(Request $request){
            $this->validate($request,[
                'name'=>'required',
                 ]);
                 $test=explode('_',$request->name);
                 $equipesusers=new EquipeUser ;   
                $equipesusers->user_id=$test[0];
                $equipesusers->equipe_id=$test[1]; 
               $equipesusers->save();
            return redirect ('employeurl')->with('success','user Added');

        }
        public function ajax(Request $request)
        {
            $equipesusers=EquipeUser::find($request->id) ;
            return response()->json('$equipesusers');
        }

}

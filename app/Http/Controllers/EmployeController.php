<?php

namespace App\Http\Controllers;
use App\Equipe;
use App\User;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function show()
    {
        $equipes =Equipe::all();
        return view('employés')->with ('equipes',$equipes);
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
}

<?php

namespace App\Http\Controllers;
use App\Equipe;
use App\User;
use App\EquipeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
Use Alert;

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
        Alert::success('Success ', 'Equipes successfully added');

        return redirect ('employeurl');

        }

        public function destroy(Request $request)
        {
            $equipes = Equipe::find($request->id);
            $equipes->delete();
            Alert::success('Success ','Equipes successfully deleted!');
            return redirect ('employeurl');
        }

        public function adduser(Request $request){
                // $test=explode('_',$request->name);
                 $equipesusers=new EquipeUser ;   
                $equipesusers->user_id=$request->iduser;
                $equipesusers->equipe_id=$request->adduser; 
               $equipesusers->save();
               return response($equipesusers);
               Alert::success('Success ','Users successfully added');
               return redirect ('employeurl')->withSuccessMessage('succesfully added') ;
               
               
        }

        public function ajax(Request $request)
        {
            
           $equipesusers=EquipeUser::Where('equipe_id',$request->id)->get();
           $result= array();

            foreach($equipesusers as $equipeuser)
            {

                $user=User::find($equipeuser->user_id);
                array_push($result,$user);
            }
            return response()->json($result);
        }

        public function name(Request $request){
        
            $equipesusers=EquipeUser::Where('equipe_id',$request->adduser)->get();
            $result= array();
            $test=array();
            foreach($equipesusers as $equipeuser)
            { 
               array_push($test,$equipeuser->user_id);
             }
        $users=User::whereNotIn('id',$test)->get();
             return response()->json($users);
            

}
                public function deletename(Request $request){
                    
                    //$equipesusers=EquipeUser::Where('user_id',$request->deleteuser)->get(); 
                    //$result= array();
                             $user=User::Where('id',$request->deleteuser)->get();
                            //array_push($result,$user); 
                         return response()->json($user);
                         Alert::question('Question Title', 'Question Message');
                }

}
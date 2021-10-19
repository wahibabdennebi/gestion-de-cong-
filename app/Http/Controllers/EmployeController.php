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
        { //dd($request);
            $equipes = Equipe::find($request->id);
            $equipes->delete();
            Alert::success('Success ','Equipes successfully deleted!');
            return redirect ('employeurl');
        }

        public function adduser(Request $request){
                // $test=explode('_',$request->name);
                $user=User::find($request->iduser);
                $user->equipe_id=$request->adduser;
                $user->save();
                /* $equipesusers=new EquipeUser ;   
                $equipesusers->user_id=$request->iduser;
                $equipesusers->equipe_id=$request->adduser; 
               $equipesusers->save();*/
               return response($user);
               Alert::success('Success ','Users successfully added');
               return redirect ('employeurl')->withSuccessMessage('succesfully added') ;
               
               
        }

        public function ajax(Request $request)
        {
            $users=User::where('equipe_id',$request->id)->get();
        // $equipesusers=EquipeUser::Where('equipe_id',$request->id)->get();
           $result= array();
            foreach($users as $user)
            {
                array_push($result,$user);
            }
            return response()->json($result);
        }

        public function name(Request $request){
          /*  $equipesusers=EquipeUser::Where('equipe_id',$request->adduser)->get();
            $result= array();
            $test=array();
            foreach($equipesusers as $equipeuser)
            { 
               array_push($test,$equipeuser->user_id);
             }*/
             //dd($request);
             $result= array();
        $users=User::where('equipe_id',1)->get();
        foreach($users as $user)
        { 
           array_push($result,$user);
           
         }
        
      //  dd($result);
             return response()->json($result);
            
}
                public function deletename(Request $request){
                    $user= User::find($request->id);
                    $user->equipe_id='1';
                    $user->save();
                       // check data deleted or not
                        if ($user) {
                            $success = true;
                            $message = "User deleted successfully";
                        } else {
                            $success = true;
                            $message = "User not found";
                        }

                        //  Return response
                        return response()->json([
                            'success' => $success,
                            'message' => $message,
                        ]);

                         }     
                         public function getUser(Request $request)
                         {
                             dd($request);
                         }                 
                         
                

}
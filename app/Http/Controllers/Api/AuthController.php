<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;

class AuthController extends Controller 
{
   public $successStatus = 200;
    
    public function register(Request $request) {    
        $validator = Validator::make($request->all(), [ 
                    'name' => 'required',
                    'email' => 'required|email',

                    //'password' => 'required',  
                    //'c_password' => 'required|same:password', 

          ]);   
        if ($validator->fails()) {          
             return response()->json(['error'=>$validator->errors()], 401);                        }    
        $input = $request->all();
        $request->request->add([
                'password'=>'123456',
                'contact_no'=>"0123456",
                'c_password'=>'123456',
                'contact_no'=>'9801234567',
                'device'=>request()->ip(),
                'visitor'=>request()->ip(),
                'education'=>'bbs',
                'address'=>'test',
            ]); 
        //$input['password'] = bcrypt($input['password']);
        //dd($request->request->all());
        $user = User::create($request->request->all()); 
        $success['token'] =  $user->createToken('AppName')->accessToken;
        return response()->json(['success'=>$success], $this->successStatus); 
    }
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('AppName')-> accessToken; 
            return response()->json(['success' => $success], $this-> successStatus); 
        } else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
    
    public function getUser() {
        $user = Auth::user('name', 'email','device_id','photo','address','province','ward','lat','long','dob','education','gender','municipality','street','type');
        return response()->json(['success' => $user], $this->successStatus); 
    }
} 
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' =>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Registro de usuario exitoso!",
        ]);
    }

    public function login(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        $user = User::where("email", "=", $request->email)->first();

        if(isset($user->id)){

            if(Hash::check($request->password, $user->password)){

                $token = $user->createToken("auth_token")->plainTextToken;

                return response()->json([
                    "status" => 1,
                    "msg" => "usuario correctamente logeado",
                    "access_token" => $token
                ]);

            }else{
                return response()->json([
                    "status" => 1,
                    "msg" => "NO hay un correo registrado",
                ]);
            }

        }else{

                return response()->json([
                    "status" => 1,
                    "msg" => "NO hay un usuario registrado",
                ]);
            }



        }

        public function userprofile() {
            return response()->json([
                "status" => 0,
                "msg" => "Acerca del perfil de usuario",
                "data" => auth()->user()
        ]);
    }
}

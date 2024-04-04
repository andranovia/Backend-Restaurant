<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'problem found',
                'errors' => $validator->errors(),
            ]);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('auth_token')->plainTextToken;
        $succes['name'] = $user->name;

        return response()->json($success);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            /** @var \App\Models\User $user */
            $user = Auth::user();

            $success['success'] = true;
            $success['token'] = $user->createToken('auth_token')->plainTextToken;
            $success['name'] = $user->name;
            $success['email'] = $user->email;

            return response()->json($success);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Cek email dan password lagi',
                'errors' => $validator->errors(),
            ]);
        }
    }


    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        $response = [
            'success'   => true,
            'message'   => 'Berhasil Logout'
        ];
        return response($response, 200);
    }
}

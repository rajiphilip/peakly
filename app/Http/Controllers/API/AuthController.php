<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    public function signin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $authUser = Auth::user();
            $success['token'] =  $authUser->createToken($authUser->id)->plainTextToken;
            $success['firstname'] =  $authUser->firstname;
            $success['lastname'] =  $authUser->lastname;
            $success['email'] =  $authUser->email;
            $success['image'] =  asset('storage/' . $authUser->image) ;
            $success['role'] =  $authUser->role;

            return $this->sendResponse($success, 'User signed in');
        } else {
            return $this->sendError('Invalid username or Password.', ['error' => 'Unauthorised']);
        }
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            $valArr = [];
            foreach ($validator->errors()->getMessages() as $key => $value) { 
                $errStr = $value[0];
                array_push($valArr, $errStr);
            }
            return $this->sendError('Error validation', $valArr);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        // $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        // $success['firstname'] =  $user->firstname;
        // $success['lastname'] =  $user->lastname;
        // $success['email'] =  $user->email;
        // $success['role'] =  $user->role;

        $success['login'] =  'Registration successful';

        

        return $this->sendResponse($success, 'User created successfully.');
    }

    // logout
    public function logout()
    {
        $user = Auth::user();
        $user->tokens($user->id)->delete();

        return $this->sendResponse([], 'Logout successful');

        return response([
            'success' => true,
            'message' => 'Logout successful'
        ], 200);
    }

    // get User Profile
    public function profile()
    {
        return response([
            'success' => true,
            'user' => Auth::user(),
            'message' => 'Profile loaded'
        ], 200);
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            $valArr = [];
            foreach ($validator->errors()->getMessages() as $key => $value) { 
                $errStr = $value[0];
                array_push($valArr, $errStr);
            }
            return $this->sendError('Error validation', $valArr);
        }

        $user = User::find(Auth::user()->id);

        if ($user->id != Auth::user()->id) {
            return response([
                'success' => false,
                'message' => 'Permission denied'
            ], 404);
        }
        
        $input = $request->all();

        $image = '';

        if ($request->file('image')) {
            $image = $request->file('image')->store('storage/profiles', 'public');
            $image = asset('public/' . $image);
        }

        $user->update([
            'firstname' => $input['firstname'],
            'lastname' => $input['lastname'],
            'email' => $input['lastname'],
            'image' => $image == '' ? $user->image : $image,
        ]);

        return $this->sendResponse([], 'Profile updated successfully.');
    }
}

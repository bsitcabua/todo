<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLoginRequest;

class UserSessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function validateRequest($request = null)
    {

        // print_r($request->validator->fails());die;
        try {

            if($request->validator){
                return [ 'response' => 201, 'validator' => $request->validator->errors()];
            }
            else{
                return null;
            }

        } catch(\Throwable $e) {
            throw $e;
        }
    }

    public function index()
    {
        return view('login');
    }

    public function store(StoreLoginRequest $request)
    {
        // Validation
        if($response = $this->validateRequest($request)){
            $response = $response['validator']->messages();
            return back()->withInput()->with('error', $response);
        }

        try{
            
            $payload = request(['username', 'password']);

            if(! Auth::attempt($payload)){
                return back()->withErrors([ 'error_msg' => 'Invalid credentials'])->withInput();
            }

            return redirect('/todo');

        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function logout()
    {
        // Destroy Auth
        auth()->logout();

        // Redirect
        return redirect('/login')->with('msg', 'You have been logged out!');
    }
}

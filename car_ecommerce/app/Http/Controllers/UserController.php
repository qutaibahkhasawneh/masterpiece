<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logindex()
    {
        return view('pages.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required'],
            'phone' => ['required', 'regex:/^([0]{1}[7-9]{1})([0-9]{8})$/', 'digits:10', Rule::unique('users', 'phone')],
            'address' => ['required'],
    ]);
    $user = new User() ;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make ($request->password);
    $user->phone = $request->phone;
    $user->address = $request->address;
    $result = $user->save();
    if($result){
        return back()->with('success','You have registered succesuflly');
    }else{
        return back()->with('fail', 'something wrong');
    }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= User::where('id', '=', $id)->first();
        return view('pages.editprofile', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function loginUser(Request $request){

        $request->validate([

            'email' => ['required', 'email'],
            'password' => ['required']

    ]);
    $user = User::where('email','=',$request->email)->first();
    if($user){
        if(Hash::check($request->password,$user->password)){
            $request->Session()->put('loginId', $user->id);
            return view('pages.index');
        }else{
            return back()->with('fail', 'The password not matches.');
        }
    }else{
        return back()->with('fail', 'This email is not registered.');
    }
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return view('pages.index');
        };
    }

    public function viewProfile(){
        $data = array();
        if (Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view('pages.profile', compact('data'));
    }

    public function updateProfile(Request $request){
        // $request->validate([
        //     'email' => ['required', 'email', Rule::unique('users', 'email')],
        //     'phone' => ['required', 'regex:/^([0]{1}[7-9]{1})([0-9]{8})$/', 'digits:10', Rule::unique('users', 'phone')],
        //     'address' => ['required'],
        // ]);
        $id= $request->id;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;

        User::where('id', '=',$id)->update([
            'phone'=>$phone,
            'email'=>$email,
            'address'=>$address,
        ]);
        return redirect()->back()->with('success','Updated Successfully');
    }
}

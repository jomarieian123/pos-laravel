<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class userController extends Controller
{
    public function index(){
        if (request()->wantsJson()) {
            return response(
                User::all()
            );
        }
        $data = User::latest()->paginate(10);
        // $data = new User();
        // $data = User::all();
        // $data = User::paginate(5);
        // $products = $products->latest()->paginate(10);
        return view('Users.index')->with('data', $data);

        // $customers = Customer::latest()->paginate(10);
        // return view('customers.index')->with('customers', $customers);
    }


    // public function show(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = User::select('*');
    //         return User::of($data)->make(true);
    //     }
    //     return view('layouts.user-setup');
    // }

    public function show($id)   
    {
        $data = User::findorfail($id);
        // return view('Users. show')->with('data', $data);
         return view('Users.show',compact('data'));
    }


    // public function edit(User $datas)
    // { 
       
    //     return view('Users.edit')->with('datas', $datas);
    // }


    public function edit(User $data,$id)
    {

        
        
        $data=User::findorFail($id);
        // $data =User::all($id);
        // print($request->first_name);
        // $data = User::all();
        // return view('Users.edit', compact('data'));
        return view('Users.edit', compact('data'));

        // return view('Users.edit')->with('data', $dat);
        // return view('Users.edit',compact('data'));
        // return view('layouts.userEdit');with('', $user);
    }

    // public function update(UserUpdateRequest $request,User $data)
    // {
    //     $data->first_name = $request->first_name;
    //     $data->last_name = $request->last_name;
    //     $data->email = $request->email;
    //     $data->status = $request->status;

    //    if (!$data->save()) {
    //       return redirect()->back()->with('error', 'Sorry, Something went wrong while updating user.');
    //    }
    //      return redirect()->route('user-setup.index')->with('success', 'Success, Product has been updated.');

    //     // return view('Users.edit')->with('user', $user);
        
    // }
    public function update(Request $request,$id)
    {

        $data = User::find($id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->status = $request->status;

        if (!$data->save()) {
            return redirect()->back()->with('error', 'Sorry, Something went wrong while updating user.');
        }
        return redirect()->route('user-setup.index')->with('success', 'Success, Product has been updated.');

    }
   
    public function destroy( $id)
    {
        
        
        $data = User::find($id);
        $data->delete($id);
        return response()->json([
            'success' => true
        ]);
    }
    
   

    // public function saved(Request $request)
    // {
        
    //         return view('layouts.userEdit');
    //         print($request->first_name);
    
    //     }
    

}




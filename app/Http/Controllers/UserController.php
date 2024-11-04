<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SiteSetting;
use App\Models\User;
use App\Models\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function Symfony\Component\Process\findArguments;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.manage',[
            'admin' => Auth::guard('admin')->user(),
            'users' =>  User::where('role', 1)->latest()->paginate(10),
            'siteSettings' => SiteSetting::where('id', 1)->first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users ',
        ];

        // Validation for other fields
        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            // Update user information
            $user = new User();
            $user->role = 1;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->save();

            $successMessage = "User has been created successfully";
            $request->session()->flash('success', $successMessage);
            return redirect(route('users.index'));
        } else {
            return back()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        // Separate validation for email
        $emailValidator = Validator::make($request->only('email'), [
            'email' => 'required|unique:users,email,' . $user->id . ',id',
        ]);

        if ($emailValidator->fails()) {
            return back()->withErrors($emailValidator);
        }

        $rules = [
            'name' => 'required',
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'required|min:6';
            $rules['confirm_password'] = 'required|same:password';
        }

        // Validation for other fields
        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {

            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            $successMessage = "User has been updated successfully";
            $request->session()->flash('success', $successMessage);
            return redirect(route('users.index'));
        } else {
            return back()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect(route('users.index'));
    }
}

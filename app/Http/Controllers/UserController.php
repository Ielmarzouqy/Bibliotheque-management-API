<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function show()
    {
        $user = auth()->user();
        return response()->json($user, 200);
    }

    public function update(Request $request , $id)
    {

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->update();
        return response()->json([
            'status' => true,
            'message' => "Profile Updated successfully!",
            'user' => $user
        ], 200);
    }
    public function destroy()
    {

        User::destroy(auth()->user()->id);
        return response()->json('User deleted', 200);
    }

}
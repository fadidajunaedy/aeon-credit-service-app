<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index () {
        $data = User::orderBy('created_at', 'asc')->get();
        return view('admin.user.index')->with('data', $data);
    }

    public function destroy (string $id) {
        User::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Success Delete Data');
    }
}

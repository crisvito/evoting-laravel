<?php

namespace App\Http\Controllers\admin\voters;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminVotersController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:isAdmin');
    }

    public function index()
    {
        return view('admin.voters.index', [
            'title' => 'Voters',
            'voters' => User::all()->where('akses_id', self::WARGA),
        ]);
    }

    public function create()
    {
        return view('admin.voters.create', [
            'title' => 'Add Voters'
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'min:8', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('admin/dashboard');
    }

    public function edit(User $user)
    {
        return view('admin.voters.edit', [
            'title' => 'Edit Voters',
            'user' => $user
        ]);
    }
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|string|min:8|max:255|unique:users';
        }
        if ($request->email != $user->email) {
            $rules['email'] = 'required|string|email|max:255|unique:users';
        }
        $validatedData = $request->validate($rules);
    }
}

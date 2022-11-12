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
            'title' => 'AddVoters'
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
}

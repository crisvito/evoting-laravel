<?php

namespace App\Http\Controllers\admin\voters;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminVotersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.voters.index', [
            'title' => 'Voters',
            'voters' => User::all()->where('akses_id', self::WARGA),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.voters.create', [
            'title' => 'Add Voters'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'integer', 'min:8', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $validatedData['password'] = Hash::make($request->password);
        User::create($validatedData);

        // User::create([
        //     'name' => $request->name,
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect('admin/dashboard/voters')->with('success', 'Berhasil menambahkan data pemilih <b>' . $request->name . '</b>');
    }

    /** 
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $voter)
    {
        return view('admin.voters.edit', [
            'title' => 'Edit Voters',
            'voter' => $voter
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $voter)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];

        if ($request->username != $voter->username) {
            $rules['username'] = 'required|string|min:8|max:255|unique:users';
        }
        if ($request->email != $voter->email) {
            $rules['email'] = 'required|string|email|max:255|unique:users';
        }
        $validatedData = $request->validate($rules);

        User::where('id', $voter->id)->update($validatedData);
        return redirect('/admin/dashboard/voters')->with('success', 'Berhasil Mengubah data pemilih <b>' . $request->name . '</b>');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $voter)
    {
        User::destroy($voter->id);
        return redirect('/admin/dashboard/voters')->with('success', 'Berhasil Menghapus data pemilih <b>' . $voter->name . '</b>');
    }
}

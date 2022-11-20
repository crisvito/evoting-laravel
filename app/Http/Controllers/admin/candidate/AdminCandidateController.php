<?php

namespace App\Http\Controllers\admin\candidate;

use App\Console\Kernel;
use App\Http\Controllers\Controller;
use App\Models\candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.candidates.index', [
            'title' => 'Candidates',
            'candidates' => candidate::all(),
            // 'candidates' => User::all()->where('akses_id', self::WARGA),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.candidates.create', [
            'title' => 'Add Candidate'
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
            'nama_ketua' => ['required', 'string'],
            'nama_wakil' => ['required', 'string'],
            'profile' => ['required', 'min:80'],
            'foto' => ['image', 'max:5000'],
        ]);

        if ($request->file('foto')) {
            $myimage = $request->file('foto')->getClientOriginalName();
            $unique_name = md5($myimage . time()) . $myimage;

            $validatedData['foto']->move(public_path('assets/kandidatFoto'), $unique_name);
            $validatedData['foto'] = $unique_name;
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->profile), 30);
        Candidate::create($validatedData);

        return redirect('/admin/dashboard/candidates')->with('success', 'Berhasil Menambah Data Kandidat');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        return view('admin.candidates.detail', [
            'title' => 'Candidate ' . $candidate->nama_ketua,
            'candidate' => $candidate
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}

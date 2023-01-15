<?php

namespace App\Http\Controllers\Superadmin;

use App\Crew;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CrewController extends Controller
{
    public function index()
    {
        $crews = Crew::orderBy('created_at', 'desc')->get();

        return view('superadmin.crew.index', [
            'crews' => $crews
        ]);
    }

    public function create()
    {
        return view('superadmin.crew.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'date_start_work' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:crews',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
        ]);

        $input = $request->all();
        $crew = Crew::create($input);

        return back()->with('success', 'Crew '.$crew->name.' berhasil dibuat!');
    }

    public function show(Crew $crew)
    {
        return view('superadmin.crew.show', [
            'crew' => $crew
        ]);
    }

    public function edit(Crew $crew)
    {
        return view('superadmin.crew.edit', [
            'crew' => $crew
        ]);
    }

    public function update(Request $request, Crew $crew)
    {
        $input = $request->all();
        $crew->update($input);

        return back()->with('success', 'Crew '.$crew->name.' berhasil diubah!');
    }

    public function destroy(Crew $crew)
    {
        $crew->delete();

        return back()->with('success', 'Crew '.$crew->name.' berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\AllergeenModel;
use Illuminate\Http\Request;

class AllergeenController extends Controller
{
    private $allergeenModel;

    public function __construct()
    {
        $this->allergeenModel = new AllergeenModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allergenen = $this->allergeenModel->sp_GetAllAllergenen();

        return view('allergenen.index', [
            'title' => 'Allergenen',
            'allergenen' => $allergenen
        ]);
    }

    public function create()
    {
        return view('allergenen.create', [
            'title' => 'Voeg een nieuwe allergeen toe'
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $data = $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:255'
        ]);

        $newId = $this->allergeenModel->sp_CreateAllergeen(
            $data['name'],
            $data['description']
        );

        return redirect()->route('allergeen.index')
            ->with('success', 'Allergeen is succesvol toegevoegd met id ' . $newId);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Category;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cat = Category::all();
        $groups = Group::all();
        return view("admin.groups", compact('cat', 'groups'));
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
        $request->validate([
            'name' => 'required',
        ]);

        Group::create([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Kelas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $group = Group::findOrFail($id);

        $group->update([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Kelas berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $group = Group::findOrFail($id);

        $group->delete();

        if($group)
        {
            return back()->with(['success' => 'Group Data Deleted Successfully']);
        }
        else
        {
            return back()->with(['error' => 'Group Data Failed to Delete']);
        }
    }
}
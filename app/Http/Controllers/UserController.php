<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function index()
    {
        $users = User::paginate(10); 
        return view('adminusers.index', compact('users'));
    }

   
    // public function create()
    // {
    //     return view('users.create');
    // }

    
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //     ]);

    //     return redirect()->route('users.index')->with('success', 'Utilisateur ajouté avec succès.');
    // }

   
    // public function show(string $id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('users.show', compact('user'));
    // }

  
    // public function edit(string $id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('users.edit', compact('user'));
    // }


    // public function update(Request $request, string $id)
    // {
    //     $user = User::findOrFail($id);

    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => "required|string|email|max:255|unique:users,email,$id",
    //     ]);

    //     $user->update($request->only('name', 'email'));

    //     return redirect()->route('users.index')->with('success', 'Utilisateur modifié avec succès.');
    // }

    // public function destroy(string $id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->delete();

    //     return redirect()->route('users.index')->with('success', 'Utilisateur supprimé.');
    // }
}

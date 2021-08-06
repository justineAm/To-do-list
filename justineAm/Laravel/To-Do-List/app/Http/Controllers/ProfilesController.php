<?php

namespace App\Http\Controllers;

use App\ListItem;
use \App\User;
use Illuminate\Http\Request;


use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($user)

    {
        $user =  User::findOrFail($user);

        return view('profiles.index', [
            'user' => $user

        ]);
    }

    public function show(Request $request, $userid)
    {
        if ($request->query('query')) {

            $id = Auth::user()->id;
            $tasks = ListItem::where('task', 'LIKE', "%" . $request->query('query') . '%')->where('user_id', $id)->get();
            return view('profiles.show', compact('tasks'));
        } else {
            $tasks = ListItem::where('user_id', Auth::user()->id)->orderBy('list_id', 'Asc')->get();
        }
        return view('profiles.show', ['tasks' => $tasks]);
    }

    public function edit(User $user)
    {

        $this->authorize('update', $user->profile);

        return view("profiles.edit", compact('user'));
    }
    
    public function update(User $user)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'email' => 'required',
            'image' => ''
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->resize(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}

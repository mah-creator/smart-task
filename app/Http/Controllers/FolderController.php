<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function index()
    {
        $folders = Folder::withCount('tasks')->get();

        return view('folders.index', compact('folders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'nullable|string|max:7',
        ]);

        Folder::create([
            'user_id' => Auth::id() ?? 1,
            'name' => $request->name,
            'color' => $request->color ?? '#5856d6',
        ]);

        return redirect()->route('folders.index');
    }

    public function destroy(Folder $folder)
    {
        $folder->delete();

        return redirect()->route('folders.index');
    }
}

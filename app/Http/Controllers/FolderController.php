<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(Request $request)
    {
        $folder = new Folder();
        $validated = $request->validate([
            'title' => ['required']
        ]);
        $folder->title = $validated['title'];
        $folder->save();
        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }
}

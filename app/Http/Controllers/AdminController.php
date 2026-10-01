<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    // Cek apakah admin sudah login
    private function checkAccess() {
        if (!Session::get('is_admin')) {
            abort(403, 'Akses Ditolak. Anda belum login sebagai admin.');
        }
    }

    public function dashboard()
    {
        $this->checkAccess();
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('projects'));
    }

    public function storeProject(Request $request)
    {
        $this->checkAccess();

        $request->validate([
            'title' => 'required|string|max:255',
            'technologies' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'nullable|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // maks 2MB
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            // simpan di storage/app/public/projects
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        Project::create([
            'title' => $request->title,
            'technologies' => $request->technologies,
            'description' => $request->description,
            'link' => $request->link,
            'image' => $imagePath
        ]);

        return back()->with('success', 'Project berhasil ditambahkan!');
    }

    public function deleteProject($id)
    {
        $this->checkAccess();

        $project = Project::findOrFail($id);
        
        // Hapus file gambar jika ada
        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return back()->with('success', 'Project berhasil dihapus!');
    }

    public function logout()
    {
        Session::forget('is_admin');
        return redirect('/login')->with('message', 'Berhasil Logout.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{

    public function index(Request $request)
    {
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(10);
        $searched = $request->searched;
        return view('announcement.index', compact('announcements', 'searched'));
    }

    public function create()
    {
        return view('/announcement/create');
    }

    
    public function store(Request $request)
    {
        //
    }

    public function show(Announcement $announcement)
    {
        return view('announcement.show', compact('announcement'));
    }

    public function edit(Announcement $announcement)
    {
        return view('announcement.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->back();
    }

}

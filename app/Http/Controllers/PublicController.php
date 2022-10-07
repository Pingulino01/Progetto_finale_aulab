<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function welcome() {
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();
        return view('welcome', compact('announcements'));
    }



    public function about(){
        return view('livewire.about');
    }

    

    public function categoryShow(Category $category)
    {
        $announcements = Announcement::where('category_id', $category->id)->where('is_accepted', true)->orderBy('created_at', 'DESC')->get();
        
        return view('announcement.categoryShow', compact('announcements', 'category'));
    }


    public function searchAnnouncements(Request $request){
        // $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(5);
        $searched = $request->searched;
        return view('announcement.index', compact('searched'));
    }


    public function setLanguage($lang)
    {
        session()->put('locale',$lang);
        return redirect()->back();
    }
}

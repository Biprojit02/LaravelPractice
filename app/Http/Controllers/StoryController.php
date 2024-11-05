<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StoryController extends Controller
{
    public function addstory(){
        return view('add-story');
    }

    public function addstorySubmit(Request $request){
        DB::table('stories')->insert([
            'title' => $request->title,
            'body'=>$request->body
        ]);
        // return response('Story added successfully');
        return redirect('allstories');
    }

    public function getallStories(){
        $stories = DB::table('stories')->get();
        return view('allStories', compact('stories'));
    }
    
    public function singleStory($id){
        $story = DB::table('stories')->where('id', $id)->first();
        return view('single-story', compact('story'));
    }
    public function editStory($id){
        $story = DB::table('stories')->where('id', $id)->first();
        return view('edit-story', compact('story'));
    }
    public function updateStory($id, Request $request){
        $story = DB::table('stories')
        ->where('id', $id)
        ->update(['title'=>$request->title, 'body'=>$request->body]);
    }

}

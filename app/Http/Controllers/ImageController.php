<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function create(){
        return view('add_image');    
    }

    public function store(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // You can adjust the validation rules as needed.
        ]);

        $image = new Image();
        $image->prompt = $request->input('prompt');

        // Store the uploaded image
        $imagePath = $request->file('image')->store('images', 'public');
        $image->image_path = $imagePath;
        $image->user_id = Auth::id();

        $image->save();

        return redirect()->route('image.create')->with('success', 'Image uploaded successfully');
    }

    public function index() {
        $images = Image::all();
        return view('images', compact('images'));
    }

    public function user_images() {
        $user = Auth::id();
        error_log($user);
        $user_images = Image::where('user_id',$user)->get();
        foreach ($user_images as $image) {
            $imguser = $image->user_id;
            error_log($imguser);
        }
        return view('dashboard',compact('user_images'));
    }
}

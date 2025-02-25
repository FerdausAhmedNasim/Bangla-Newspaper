<?php

namespace App\Http\Controllers;

use App\Models\Newspaper;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class NewspaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newspapers = Newspaper::all();
        return view('admin.index', compact('newspapers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Data validate check
        $request->validate([
            'title'        => 'nullable|string|max:255',
            'headlines'    => 'nullable|string|max:500',
            'hero_section' => 'nullable|string|max:500',
            'description'  => 'nullable|string|max:10000',
            'video'        => 'nullable|mimes:mp4,avi,mkv|max:50000',
        ]);

        // File upload and store paths properly
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('uploads/images', 'public') : null;
        $videoPath = $request->hasFile('video') ? $request->file('video')->store('uploads/videos', 'public') : null;
        $bannerPath = $request->hasFile('banner') ? $request->file('banner')->store('uploads/banners', 'public') : null;


        // Data create
        $newspaper = Newspaper::create([
            'title'        => $request->title,
            'headlines'    => $request->headlines,
            'hero_section' => $request->hero_section,
            'banner'       => $bannerPath,
            'description'  => $request->description,
            'image'        => $imagePath,
            'video'        => $videoPath,
        ]);

        //if Success then give msg and go to dashboard
        return redirect('/dashboard')->with('success', 'Newspaper added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Newspaper $newspaper)
    {
        return view('admin.show', compact('newspaper'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Newspaper $newspaper)
    {
        return view('admin.edit', compact('newspaper'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Newspaper $newspaper)
    {

        // Data validate check
        $request->validate([
            'title'        => 'nullable|string|max:255',
            'headlines'    => 'nullable|string|max:500',
            'hero_section' => 'nullable|string|max:500',
            'description'  => 'nullable|string|max:10000',
            'video'        => 'nullable|mimes:mp4,avi,mkv|max:50000',
        ]);

        // ফাইল আপলোড (আগের ফাইল মুছে ফেলার ব্যবস্থা)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/images', 'public');
            $newspaper->image = $imagePath;
        }

        if ($request->hasFile('banner')) {
            $bannerPath = $request->file('banner')->store('uploads/banners', 'public');
            $newspaper->banner = $bannerPath;
        }

        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('uploads/videos', 'public');
            $newspaper->video = $videoPath;
        }

        // অন্যান্য ডাটা আপডেট
        $newspaper->title = $request->title;
        $newspaper->headlines = $request->headlines;
        $newspaper->hero_section = $request->hero_section;
        $newspaper->description = $request->description;

        $newspaper->save(); // ডাটাবেজে সংরক্ষণ

        return redirect('/dashboard')->with('success', 'Newspaper updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Newspaper $newspaper)
    {
        $newspaper->delete();
        return redirect('/dashboard')->with('success', 'Newspaper delete successfully!');
    }
}

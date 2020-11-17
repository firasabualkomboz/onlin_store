<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\MainCategory;





class SectionController extends Controller
{

    public function index(){

        return view('admin.subcategories.index')->with('sections',Section::all());

    }

    public function create(){

        $maincategory = MainCategory::where('translation_of',0)->active()->get();
        return view('admin.subcategories.create',compact('maincategory'));


    }


    public function store(Request $request)
    {


        $this->validate($request,[
            "name"     => "required",
            // "content"   => "required",
            "section_id"   => "required",
            "photosection"  => "required|image",
            // "tags"   => "required"

        ]);

        $photosection = $request->photosection;
        $photosection_new_name = time().$photosection->getClientOriginalName();
        $photosection->move('uploads/image',$photosection_new_name);



        $post = Section::create([
            "name"    => $request->name,
            // "content"  => $request->content,
            "section_id"  => $request->section_id,
            "photosection" => 'uploads/image/'.$photosection_new_name,

        ]);



         return redirect()->back();
         // dd($request->all());
    }




}

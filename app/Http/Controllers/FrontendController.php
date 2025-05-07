<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\SectionStatus;

class FrontendController extends Controller
{
    public function index()
    {
      $videoBlogCategories = BlogCategory::where('status', 1)
        ->where('type', 2)
        ->with(['blogs' => function($q) {
            $q->where('status', 1)
              ->where('type', 2)
              ->latest();
        }])
        ->latest()
        ->get();

        $section_status = SectionStatus::first();
        return view('frontend.index', compact('videoBlogCategories', 'section_status'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function category()
    {
        return view('frontend.category');
    }

    public function categoryProperty($id)
    {
        $property = Property:: where('category_id','=',$id)->get();
        return view('frontend.catproperty', compact('property','id'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function projects()
    {
        return view('frontend.projects');
    }

    public function services()
    {
        return view('frontend.services');
    }

    public function privacy()
    {
        return view('frontend.privacy');
    }

    public function terms()
    {
        return view('frontend.terms');
    }

    

    public function getquote()
    {
        return view('frontend.getquote');
    }
}

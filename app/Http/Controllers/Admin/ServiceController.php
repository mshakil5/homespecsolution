<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Image;

class ServiceController extends Controller
{
    public function index()
    {
        $data = Service::orderBy('id', 'DESC')->get();
        return view('admin.services.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'message' => $validator->errors()->first()]);
        }

        $service = new Service();
        $service->title = $request->title;
        $service->slug = $this->generateUniqueSlug($request->title, Service::class);
        $service->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        
            $imagePath = public_path('images/services/' . $imageName);
            Image::make($image)
                ->fit(525, 320)
                ->save($imagePath);
        
            $service->image = '/images/services/' . $imageName;
        }

        $service->save();

        return response()->json(['status' => 200, 'message' => 'Service created successfully.']);
    }

    private function generateUniqueSlug($title, $model)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;
    
        while ($model::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
    
        return $slug;
    }

    public function edit($id)
    {
        $data = Service::findOrFail($id);
        return response()->json(['data' => $data]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['status' => 422, 'message' => $validator->errors()->first()]);
        }
    
        $service = Service::findOrFail($request->codeid);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->slug = Str::slug($request->title);
    
        if ($request->hasFile('image')) {
            if ($service->image && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }
        
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('images/services/' . $imageName);
        
            Image::make($image)
                ->fit(525, 320)
                ->save($imagePath);
        
            $service->image = '/images/services/' . $imageName;
        }

        $service->save();
    
        return response()->json(['status' => 200, 'message' => 'Service updated successfully.']);
    }  

    public function delete($id)
    {
        $service = Service::findOrFail($id);
    
        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
        }
    
        $service->delete();
    
        return response()->json(['status' => 200, 'message' => 'Service deleted successfully.']);
    }  

    public function updateStatus(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->status = $request->status;
        $service->save();

        return response()->json(['status' => 200, 'message' => 'Status updated successfully.']);
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index',compact('banners'));
    }

    public function store(Request $request)
    {
            try{
                $cat = new Banner();
                $cat->name= $request->name;
                if ($request->image) {
                    $request->validate([
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $rand = mt_rand(100000, 999999);
                    $imageName = time(). $rand .'.'.$request->image->extension();
                    $request->image->move(public_path('images/banner'), $imageName);
                    $cat->image= $imageName;
                }
                
                $cat->created_by= Auth::user()->id;
    
            if ($cat->save()) {
                $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Created Successfully.</b></div>";
                return response()->json(['status'=> 300,'message'=>$message]);
            }

            }catch (\Exception $e){
                return response()->json(['status'=> 303,'message'=>'Server Error!!']);

            }

    }

    public function edit($id)
    {
        $where = [
            'id'=>$id
        ];
        $info = Banner::where($where)->get()->first();
        return response()->json($info);
    }

    public function update(Request $request, $id)
    {
        $cat = Banner::find($id);
        $cat->name = $request->name;
        if ($request->image != 'null') {
            $image_path = public_path('images/banner').'/'.$cat->cat;
            // unlink($image_path);
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->image->extension();
            $request->image->move(public_path('images/banner'), $imageName);
            $cat->image= $imageName;
        }
    
        if ($cat->save()) {

            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    
}

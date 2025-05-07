<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SectionStatus;

class SectionController extends Controller
{
  public function sectionStatus()
  {
      $status = SectionStatus::firstOrCreate();
      return view('admin.section.section_status', compact('status'));
  }

  public function updateSectionStatus(Request $request)
  {
      $status = SectionStatus::firstOrCreate([]);

      $request->validate([
          'slider' => 'required|in:0,1',
          'about' => 'required|in:0,1',
          'projects' => 'required|in:0,1',
          'services' => 'required|in:0,1',
          'why_choose_us' => 'required|in:0,1',
          'video_blog' => 'required|in:0,1',
          'get_in_touch' => 'required|in:0,1'
      ]);

      $status->slider = $request->input('slider');
      $status->about = $request->input('about');
      $status->projects = $request->input('projects');
      $status->services = $request->input('services');
      $status->why_choose_us = $request->input('why_choose_us');
      $status->video_blog = $request->input('video_blog');
      $status->get_in_touch = $request->input('get_in_touch');
      $status->save();

      return redirect()->back()->with('success', 'Section statuses updated successfully');
  }
}
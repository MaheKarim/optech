<?php

namespace Modules\Team\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::latest()->get();

        return view('team::index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('team::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
          'name' => 'required|string',
            'slug' => 'required|string',
            'image' => 'required|image',
            'description' => 'required|string',
            'designation' => 'required|string',
            'mail' => 'required|email',
            'phone_number' => 'required|string',
            'facebook' => 'required|string',
            'twitter' => 'required|string',
            'linkedin' => 'required|string',
            'instagram' => 'required|string',
       ]);

        $team = new Team();

        if ($request->image) {
            $image_name = 'team' . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.webp';
            $image_name = 'uploads/custom-images/' . $image_name;
            Image::make($request->image)
                ->encode('webp', 80)
                ->save(public_path() . '/' . $image_name);
            $team->image = $image_name;
        }

        $team->name = $request->name;
        $team->slug = $request->slug;
        $team->description = $request->description;
        $team->designation = $request->designation;
        $team->mail = $request->mail;
        $team->phone_number = $request->phone_number;
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->linkedin = $request->linkedin;
        $team->instagram = $request->instagram;
        $team->save();

        return redirect()->route('admin.team.index')->with('success', 'Team created successfully');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('team::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $teamMember = Team::findOrFail($id);
        return view('team::edit', compact('teamMember'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $project = Team::findOrFail($id);

        if($request->lang_code == admin_lang()) {

            if($request->image) {
                $old_image = $project->image;
                $image_name = 'team'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
                $image_name ='uploads/custom-images/'.$image_name;
                Image::make($request->image)
                    ->encode('webp', 80)
                    ->save(public_path().'/'.$image_name);
                $project->image = $image_name;
                $project->save();

                if($old_image) {
                    if(File::exists(public_path().'/'.$old_image)) unlink(public_path().'/'.$old_image);
                }
            }

            $project->name = $request->name;
            $project->slug = $request->slug;
            $project->description = $request->description;
            $project->designation = $request->designation;
            $project->mail = $request->mail;
            $project->phone_number = $request->phone_number;
            $project->facebook = $request->facebook;
            $project->twitter = $request->twitter;
            $project->linkedin = $request->linkedin;
            $project->instagram = $request->instagram;
            $project->save();
        }

        $notify_message = trans('translate.Updated Successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $old_image = $team->image;

        if($old_image){
            if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        }

        $team->delete();

        $notify_message=  trans('translate.Delete Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.team.index')->with($notify_message);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frontend;
use Illuminate\Http\Request;
Use File;

class FrontEndManagementController extends Controller
{
    public function index()
    {
        $jsonUrl = resource_path('views/admin/settings.json');
        $sections = json_decode(file_get_contents($jsonUrl), true);
        ksort($sections);

        return view('admin.frontend-management.index', compact('sections'));
    }

    public function store(Request $request, $key, $id = null)
    {
        $jsonUrl = resource_path('views/admin/settings.json');
        $sections = json_decode(file_get_contents($jsonUrl), true);

        if (!isset($sections[$key])) {
            abort(404, "Section not found for key: $key");
        }

        $section = $sections[$key];
        $contentType = isset($section['content']) ? 'content' : (isset($section['element']) ? 'element' : null);

        if (!$contentType) {
            abort(404, "Content or Element not found for section: $key");
        }

        $dataKeys = $key . '.' . $contentType;
        $data = $request->except(['_token', '_method', 'type']);
        $frontend = $id ? Frontend::findOrFail($id) : new Frontend();

        // Handle image uploads
        if (isset($section[$contentType]['images'])) {
            foreach ($section[$contentType]['images'] as $imageKey => $imageDetails) {
                if ($request->hasFile($imageKey)) {
                    $image = $request->file($imageKey);
                    $imageName = time() . '_' . $imageKey . '.' . $image->getClientOriginalExtension();
                    $oldFile = $frontend->data_values['images'][$imageKey] ?? null;

                    if($oldFile){
                         if(File::exists(public_path($oldFile)))unlink(public_path($oldFile));
                     }

                    $imagePath = $image->move(public_path('uploads/website-images'), $imageName);
                    $data['images'][$imageKey] = 'uploads/website-images/'. $imageName;


                } elseif ($frontend->data_values['images'][$imageKey] ?? null) {
                    // Preserve existing image if no new image is uploaded
                    $data['images'][$imageKey] = $frontend->data_values['images'][$imageKey];
                }
            }
        }

        $frontend->data_keys = $dataKeys;
        $frontend->data_values = $data;
        $frontend->save();

        return back()->with('success', 'Frontend content updated successfully');
    }

    public function section($key)
    {
        $jsonUrl = resource_path('views/admin/settings.json');
        $sections = json_decode(file_get_contents($jsonUrl), true);

        if (!isset($sections[$key])) {
            abort(404, "Section not found for key: $key");
        }

        $section = $sections[$key];

        // Determine if the section has 'content' or 'element'
        $contentType = isset($section['content']) ? 'content' : (isset($section['element']) ? 'element' : null);

        if (!$contentType) {
            abort(404, "Content or Element not found for section: $key");
        }

        $dataKeys = $key . '.' . $contentType;
        $content = $section[$contentType];

        // Retrieve existing data from the database
        $frontend = Frontend::where('data_keys', $dataKeys)->first();
        $dataValues = $frontend ? $frontend->data_values : [];

        // Count images
        $imageCount = isset($content['images']) ? count($content['images']) : 0;

        return view('admin.frontend-management.edit', compact('key', 'content', 'dataValues', 'frontend', 'contentType', 'imageCount'));
    }
}

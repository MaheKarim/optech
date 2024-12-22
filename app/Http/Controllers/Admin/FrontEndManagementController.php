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

    public function section($key)
    {
        $lang_code = request('lang_code', 'en');

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
        $content = $section[$contentType];

        // Get frontend data
        $frontend = Frontend::where('data_keys', $dataKeys)->first();

        if ($lang_code === 'en') {
            // For English, get data directly from data_values
            $dataValues = $frontend ? $frontend->data_values : [];
//            dd($dataValues);
        } else {
            if ($frontend) {
                // Get translations array
                $translations = json_decode($frontend->data_translations, true) ?? [];

                // Find translation for current language
                $translation = collect($translations)->first(function($item) use ($lang_code) {
                    return $item['language_code'] === $lang_code;
                });
//                dd($translation);

                if ($translation) {
                    // Use existing translation
                    $dataValues = $translation['values'];
//                    $translations[] = [
//                        'language_code' => $lang_code,
//                        'values' => $frontend->$dataValues
//                    ];

                    // Save updated translations
                    $frontend->data_translations = json_encode($translations);
                    $frontend->save();


                } else {
                    // Create new translation entry with data_values

                    $dataValues = $frontend->data_values;
                    // Data Translation $key
                    // Exclude images from translations
                    unset($dataValues['images']);

                    // Add new language entry to translations
                    $translations[] = [
                        'language_code' => $lang_code,
                        'values' => $frontend->data_values
                    ];

                    // Save updated translations
                    $frontend->data_translations = json_encode($translations);
                    $frontend->save();
                }
            } else {
                $dataValues = [];
            }
        }

        // Count images
        $imageCount = isset($content['images']) ? count($content['images']) : 0;

        return view('admin.frontend-management.edit', compact('key', 'content', 'dataValues', 'frontend', 'contentType', 'imageCount', 'lang_code'));
    }

    public function store(Request $request, $key, $id = null)
    {
        $jsonUrl = resource_path('views/admin/settings.json');
        $sections = json_decode(file_get_contents($jsonUrl), true);
        $lang_code = request('lang_code', 'en');


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

        if ($lang_code === 'en') {
            // For English, get data directly from data_values
            $dataValues = $frontend ? $frontend->data_values : [];
//            dd($dataValues);
        } else {
            if ($frontend) {
                // Get translations array
                $translations = json_decode($frontend->data_translations, true) ?? [];
//                dd($translations);

                // Find translation for current language
                $translation = collect($translations)->first(function($item) use ($lang_code) {
                    return $item['language_code'] === $lang_code;
                });

                if ($translation) {
                    // Use existing translation
                    $dataValues = $translation['values'];
                } else {
                    // Create new translation entry with data_values
                    $dataValues = $frontend->data_values;
                    dd($dataValues);
                    // Exclude images from translations
                    unset($dataValues['images']);

                    // Add new language entry to translations
                    $translations[] = [
                        'language_code' => $lang_code,
                        'values' => $frontend->data_values
                    ];

                    // Save updated translations
                    $frontend->data_translations = json_encode($translations);
                    $frontend->save();
                }
            } else {
                $dataValues = [];
            }
        }

        // Separate text data from images
        $textData = [];
        $imageData = [];

        // Handle image uploads
        if (isset($section[$contentType]['images'])) {
            foreach ($section[$contentType]['images'] as $imageKey => $imageDetails) {
                if ($request->hasFile($imageKey)) {
                    $image = $request->file($imageKey);
                    $imageName = time() . '_' . $imageKey . '.' . $image->getClientOriginalExtension();
                    $oldFile = $frontend->data_values['images'][$imageKey] ?? null;

                    if ($oldFile) {
                        if (File::exists(public_path($oldFile))) unlink(public_path($oldFile));
                    }

                    $imagePath = $image->move(public_path('uploads/website-images'), $imageName);
                    $imageData[$imageKey] = 'uploads/website-images/' . $imageName;
                } elseif ($frontend->data_values['images'][$imageKey] ?? null) {
                    $imageData[$imageKey] = $frontend->data_values['images'][$imageKey];
                }
            }
        }

        // Separate text data from the request
        foreach ($data as $key => $value) {
            if ($key !== 'images') {
                $textData[$key] = $value;
            }
        }

        // Combine text data with images array
        $finalData = $textData;
        if (!empty($imageData)) {
            $finalData['images'] = $imageData;
        }

        $frontend->data_keys = $dataKeys;
        $frontend->data_values = $finalData;

        // Handle translations - only include text data
        $translations = $frontend->data_translations ?? [];
        if (!is_array($translations)) {
            $translations = [];
        }

        // Create English translation entry with text data only
        $englishTranslation = [
            'language_code' => 'en',
            'values' => $textData // Only text data is stored in translations
        ];

        // Update or add English translation
        $translationExists = false;
        foreach ($translations as $key => $translation) {
            if ($translation['language'] === 'en') {
                $translations[$key] = $englishTranslation;
                $translationExists = true;
                break;
            }
        }


        if (!$translationExists) {
            $translations[] = $englishTranslation;
        }

        $frontend->data_translations = $translations;







        $frontend->save();

        return back()->with('success', 'Frontend content updated successfully');
    }
}

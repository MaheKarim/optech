<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frontend;
use Illuminate\Http\Request;
use File;

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

        $frontend = Frontend::where('data_keys', $dataKeys)->first();

        if ($lang_code === 'en') {
            $dataValues = $frontend ? $frontend->data_values : [];
        } else {
            if ($frontend) {
                // Get translations array
                $translations = json_decode($frontend->data_translations, true) ?? [];

                $translation = collect($translations)->first(function ($item) use ($lang_code) {
                    return $item['language_code'] === $lang_code;
                });

                if ($translation) {
                    $dataValues = $translation['values'];

                    $frontend->data_translations = json_encode($translations);
                    $frontend->save();
                } else {
                    // Create new translation entry with data_values

                    $dataValues = $frontend->data_values;
                    // Data Translation $key
                    unset($dataValues['images']);

                    // Add new language entry to translations
                    $translations[] = [
                        'language_code' => $lang_code,
                        'values' => $frontend->data_values
                    ];

                    $frontend->data_translations = json_encode($translations);
                    $frontend->save();
                }
            } else {
                $dataValues = [];
            }
        }

        // Count images
        $imageCount = isset($content['images']) ? count($content['images']) : 0;
        $pageTitle = $section['name'] ?? trans('Frontend Management');
        return view('admin.frontend-management.edit', compact('pageTitle','key', 'content', 'dataValues', 'frontend', 'contentType', 'imageCount', 'lang_code'));
    }

    public function store(Request $request, $key, $id = null)
    {
        $lang_code = $request->get('lang_code');

        if (!$lang_code) {
            return back()->with('error', 'Language code is required');
        }

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
        $data = $request->except(['_token', '_method', 'type','lang_code']);
        $frontend = $id ? Frontend::findOrFail($id) : new Frontend();

        $translations = json_decode($frontend->data_translations, true) ?? [];

        $textData = [];
        $imageData = [];

        if ($lang_code === 'en' && isset($section[$contentType]['images'])) {
            foreach ($section[$contentType]['images'] as $imageKey => $imageDetails) {
                if ($request->hasFile($imageKey)) {
                    $image = $request->file($imageKey);
                    $imageName = time() . '_' . $imageKey . '.' . $image->getClientOriginalExtension();
                    $oldFile = $frontend->data_values['images'][$imageKey] ?? null;

                    if ($oldFile && File::exists(public_path($oldFile))) {
                        unlink(public_path($oldFile));
                    }

                    $image->move(public_path('uploads/website-images'), $imageName);
                    $imageData[$imageKey] = 'uploads/website-images/' . $imageName;
                } elseif (isset($frontend->data_values['images'][$imageKey])) {
                    $imageData[$imageKey] = $frontend->data_values['images'][$imageKey];
                }
            }
        }

        foreach ($data as $key => $value) {
            if ($key !== 'images') {
                $textData[$key] = $value;
            }
        }

        if ($lang_code === 'en') {
            $finalData = $textData;
            if (!empty($imageData)) {
                $finalData['images'] = $imageData;
            } elseif (isset($frontend->data_values['images'])) {
                $finalData['images'] = $frontend->data_values['images'];
            }

            $frontend->data_values = $finalData;

            $translationExists = false;
            foreach ($translations as $key => $translation) {
                if ($translation['language_code'] === 'en') {
                    $translations[$key]['values'] = $textData;
                    $translationExists = true;
                    break;
                }
            }

            if (!$translationExists) {
                $translations[] = [
                    'language_code' => 'en',
                    'values' => $textData
                ];
            }
        } else {
            $translationExists = false;

            foreach ($translations as $key => $translation) {
                if ($translation['language_code'] === $lang_code) {
                    $translations[$key]['values'] = $textData;
                    $translationExists = true;
                    break;
                }
            }

            if (!$translationExists) {
                $translations[] = [
                    'language_code' => $lang_code,
                    'values' => $textData
                ];
            }

            if (empty($frontend->data_values)) {
                $frontend->data_values = [
                    'images' => $imageData
                ];

                $hasEnglishTranslation = false;
                foreach ($translations as $translation) {
                    if ($translation['language_code'] === 'en') {
                        $hasEnglishTranslation = true;
                        break;
                    }
                }

                if (!$hasEnglishTranslation) {
                    $translations[] = [
                        'language_code' => 'en',
                        'values' => []
                    ];
                }
            }
        }

        if (!$frontend->data_keys) {
            $frontend->data_keys = $dataKeys;
        }

        $frontend->data_translations = json_encode($translations);
        $frontend->save();

        return back()->with('success', "Content updated successfully for language: {$lang_code}");
    }}

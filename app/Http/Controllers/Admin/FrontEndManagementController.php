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
                $translations = json_decode($frontend->data_translations, true) ?? [];

                // Find translation for current language
                $translation = collect($translations)->first(function ($item) use ($lang_code) {
                    return $item['language_code'] === $lang_code;
                });

                if ($translation) {
                    $dataValues = $translation['values'];
                } else {
                    // Create new translation entry
                    $dataValues = $frontend->data_values;
                    // Remove images from translation
                    unset($dataValues['images']);

                    $translations[] = [
                        'language_code' => $lang_code,
                        'values' => $dataValues
                    ];

                    $frontend->data_translations = json_encode($translations);
                    $frontend->save();
                }
            } else {
                $dataValues = [];
            }
        }

        // Transform flattened data into nested structure
        // Transform the nested data structure
        if (is_array($dataValues)) {
            $dataValues = $this->transformNestedData($dataValues);
        }

        $imageCount = isset($content['images']) ? count($content['images']) : 0;
        $pageTitle = $section['name'] ?? trans('Frontend Management');

        return view('admin.frontend-management.edit',
            compact('pageTitle', 'key', 'content', 'dataValues', 'frontend', 'contentType', 'imageCount', 'lang_code')
        );
    }    //    public function store(Request $request, $key, $id = null)
//    {
//        $lang_code = $request->get('lang_code');
//
//        if (!$lang_code) {
//            return back()->with('error', 'Language code is required');
//        }
//
//        $jsonUrl = resource_path('views/admin/settings.json');
//        $sections = json_decode(file_get_contents($jsonUrl), true);
//
//        if (!isset($sections[$key])) {
//            abort(404, "Section not found for key: $key");
//        }
//
//        $section = $sections[$key];
//        $contentType = isset($section['content']) ? 'content' : (isset($section['element']) ? 'element' : null);
//
//        if (!$contentType) {
//            abort(404, "Content or Element not found for section: $key");
//        }
//
//        $dataKeys = $key . '.' . $contentType;
//        $data = $request->except(['_token', '_method', 'type','lang_code']);
//        $frontend = $id ? Frontend::findOrFail($id) : new Frontend();
//
//        $translations = json_decode($frontend->data_translations, true) ?? [];
//
//        $textData = [];
//        $imageData = [];
//
//        if ($lang_code === 'en' && isset($section[$contentType]['images'])) {
//            foreach ($section[$contentType]['images'] as $imageKey => $imageDetails) {
//                if ($request->hasFile($imageKey)) {
//                    $image = $request->file($imageKey);
//                    $imageName = time() . '_' . $imageKey . '.' . $image->getClientOriginalExtension();
//                    $oldFile = $frontend->data_values['images'][$imageKey] ?? null;
//
//                    if ($oldFile && File::exists(public_path($oldFile))) {
//                        unlink(public_path($oldFile));
//                    }
//
//                    $image->move(public_path('uploads/website-images'), $imageName);
//                    $imageData[$imageKey] = 'uploads/website-images/' . $imageName;
//                } elseif (isset($frontend->data_values['images'][$imageKey])) {
//                    $imageData[$imageKey] = $frontend->data_values['images'][$imageKey];
//                }
//            }
//        }
//
//        foreach ($data as $key => $value) {
//            if ($key !== 'images') {
//                $textData[$key] = $value;
//            }
//        }
//
//        if ($lang_code === 'en') {
//            $finalData = $textData;
//            if (!empty($imageData)) {
//                $finalData['images'] = $imageData;
//            } elseif (isset($frontend->data_values['images'])) {
//                $finalData['images'] = $frontend->data_values['images'];
//            }
//
//            $frontend->data_values = $finalData;
//
//            $translationExists = false;
//            foreach ($translations as $key => $translation) {
//                if ($translation['language_code'] === 'en') {
//                    $translations[$key]['values'] = $textData;
//                    $translationExists = true;
//                    break;
//                }
//            }
//
//            if (!$translationExists) {
//                $translations[] = [
//                    'language_code' => 'en',
//                    'values' => $textData
//                ];
//            }
//        } else {
//            $translationExists = false;
//
//            foreach ($translations as $key => $translation) {
//                if ($translation['language_code'] === $lang_code) {
//                    $translations[$key]['values'] = $textData;
//                    $translationExists = true;
//                    break;
//                }
//            }
//
//            if (!$translationExists) {
//                $translations[] = [
//                    'language_code' => $lang_code,
//                    'values' => $textData
//                ];
//            }
//
//            if (empty($frontend->data_values)) {
//                $frontend->data_values = [
//                    'images' => $imageData
//                ];
//
//                $hasEnglishTranslation = false;
//                foreach ($translations as $translation) {
//                    if ($translation['language_code'] === 'en') {
//                        $hasEnglishTranslation = true;
//                        break;
//                    }
//                }
//
//                if (!$hasEnglishTranslation) {
//                    $translations[] = [
//                        'language_code' => 'en',
//                        'values' => []
//                    ];
//                }
//            }
//        }
//
//        if (!$frontend->data_keys) {
//            $frontend->data_keys = $dataKeys;
//        }
//
//        $frontend->data_translations = json_encode($translations);
//        $frontend->save();
//
//        return back()->with('success', "Content updated successfully for language: {$lang_code}");
//    }


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
        $data = $request->except(['_token', '_method', 'type', 'lang_code']);
        $frontend = $id ? Frontend::findOrFail($id) : new Frontend();

        $translations = json_decode($frontend->data_translations, true) ?? [];

        // Function to process nested form data with proper array structure
        function processFormData($data) {
            $processed = [];

            foreach ($data as $key => $value) {
                // Check if the key contains array notation [...]
                if (preg_match('/^([^[]+)(?:\[([^\]]+)\])+/', $key, $matches)) {
                    $mainKey = $matches[1];
                    preg_match_all('/\[([^\]]+)\]/', $key, $nestedKeys);

                    if (!isset($processed[$mainKey])) {
                        $processed[$mainKey] = [];
                    }

                    $current = &$processed[$mainKey];
                    foreach ($nestedKeys[1] as $nestedKey) {
                        if (!isset($current[$nestedKey])) {
                            $current[$nestedKey] = [];
                        }
                        $current = &$current[$nestedKey];
                    }
                    $current = $value;
                } else {
                    $processed[$key] = $value;
                }
            }

            return $processed;
        }

        // Process the form data
        $textData = processFormData($data);

        // Handle image uploads if any
        $imageData = [];
        if ($lang_code === 'en' && isset($section[$contentType]['images'])) {
            foreach ($section[$contentType]['images'] as $imageKey => $imageDetails) {
                if ($request->hasFile($imageKey)) {
                    $image = $request->file($imageKey);
                    $imageName = time() . '_' . $imageKey . '.' . $image->getClientOriginalExtension();

                    $oldFile = isset($frontend->data_values['images'][$imageKey]) ? $frontend->data_values['images'][$imageKey] : null;
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

        // Handle English content
        if ($lang_code === 'en') {
            $finalData = $textData;
            if (!empty($imageData)) {
                $finalData['images'] = $imageData;
            } elseif (isset($frontend->data_values['images'])) {
                $finalData['images'] = $frontend->data_values['images'];
            }

            $frontend->data_values = $finalData;

            // Update or add English translation
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
            // Handle non-English content
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

                // Check if English translation exists
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
    }

    private function transformNestedData($data, $prefix = '') {
        $result = [];
        foreach ($data as $key => $value) {
            // Rename specific keys
            if ($key === 'package' && is_array($value)) {
                foreach ($value as $subKey => $subValue) {
                    if ($subKey === 'information') {
                        $newPrefix = $prefix ? "{$prefix}_information" : 'information';
                        $nested = $this->transformNestedData($subValue, $newPrefix);
                        $result = array_merge($result, $nested);
                    }
                }
                continue;
            }

            if ($key === 'package' && is_array($value)) {
                foreach ($value as $packageNumber => $packageData) {
                    $packageKey = "package_{$packageNumber}";
                    $newPrefix = $prefix ? "{$prefix}_{$packageKey}" : $packageKey;
                    $nested = $this->transformNestedData($packageData, $newPrefix);
                    $result = array_merge($result, $nested);
                }
                continue;
            }

            $newKey = $prefix ? "{$prefix}_{$key}" : $key;
            if (is_array($value)) {
                $nested = $this->transformNestedData($value, $newKey);
                $result = array_merge($result, $nested);
            } else {
                $result[$newKey] = $value;
            }
        }
        return $result;
    }

}

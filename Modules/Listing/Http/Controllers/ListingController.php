<?php

namespace Modules\Listing\Http\Controllers;

use App\Models\Order;
use Auth, Image, File, Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Listing\Entities\Listing;

use Modules\Category\Entities\Category;
use Modules\Category\Entities\SubCategory;
use Modules\Language\App\Models\Language;
use Illuminate\Contracts\Support\Renderable;
use Modules\Listing\Entities\ListingGallery;
use Modules\Listing\Entities\ListingTranslation;
use Modules\Listing\Http\Requests\ListingRequest;
use Modules\Project\App\Models\Project;
use Modules\Project\App\Models\ProjectTranslation;

class ListingController extends Controller
{

    public function index()
    {
        $listings = Listing::with('translate','category')->latest()->get();

        return view('listing::index', compact('listings'));
    }

    public function awaiting_listings()
    {
        $listings = Listing::with('translate')->where('approved_by_admin', 'pending')->latest()->get();

        return view('listing::awaiting_listing', compact('listings'));
    }

    public function featured_listings()
    {
        $listings = Listing::with('translate')->where('is_featured', 'enable')->latest()->get();

        return view('listing::featured_listing', compact('listings'));
    }

    public function create(Request $request)
    {
        $categories = Category::with('translate')->where('status', 'enable')->get();

        return view('listing::create', compact('categories', ));
    }

    public function store(ListingRequest $request)
    {
        $listing = new Listing();

        if($request->thumb_image){
            $image_name = 'listing'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->thumb_image)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $listing->thumb_image = $image_name;
        }

        $listing->category_id = $request->category_id;
        $listing->sub_category_id = $request->sub_category_id;
        $listing->slug = $request->slug;
        $listing->status = 'enable';
        $listing->seo_title = $request->seo_title ? $request->seo_title : $request->title;
        $listing->seo_description = $request->seo_description ? $request->seo_description : $request->title;
        $listing->save();


        $languages = Language::all();
        foreach($languages as $language){
            $listing_translate = new ListingTranslation();
            $listing_translate->lang_code = $language->lang_code;
            $listing_translate->listing_id = $listing->id;
            $listing_translate->title = $request->title;
            $listing_translate->description = $request->description;
            $listing_translate->save();
        }


        $notify_message= trans('translate.Created Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.listings.edit', ['listing' => $listing->id, 'lang_code' => admin_lang()] )->with($notify_message);
    }

    public function edit(Request $request, $id)
    {

        $listing = Listing::findOrFail($id);

        $listing_translate = ListingTranslation::where(['listing_id' => $id, 'lang_code' => $request->lang_code])->first();

        $categories = Category::with('translate')->where('status', 'enable')->get();

        $subcategories = SubCategory::where('category_id', $listing->category_id)->with('translate')->get();


        return view('listing::edit', compact('categories', 'listing', 'listing_translate', 'subcategories'));
    }

    public function update(ListingRequest $request, $id)
    {

        $listing = Listing::findOrFail($id);

        if($request->lang_code == admin_lang()) {

            if($request->thumb_image){
                $old_image = $listing->thumb_image;
                $image_name = 'listing'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
                $image_name ='uploads/custom-images/'.$image_name;
                Image::make($request->thumb_image)
                    ->encode('webp', 80)
                    ->save(public_path().'/'.$image_name);
                $listing->thumb_image = $image_name;
                $listing->save();

                if($old_image) {
                    if(File::exists(public_path().'/'.$old_image)) unlink(public_path().'/'.$old_image);
                }
            }

            $listing->category_id = $request->category_id;
            $listing->sub_category_id = $request->sub_category_id;
            $listing->slug = $request->slug;
            $listing->seo_title = $request->seo_title ? $request->seo_title : $request->title;
            $listing->seo_description = $request->seo_description ? $request->seo_description : $request->title;
            $listing->save();

        }

        $listing_translate = ListingTranslation::findOrFail($request->translate_id);
        $listing_translate->title = $request->title;
        $listing_translate->description = $request->description;
        $listing_translate->save();

        $notify_message = trans('translate.Updated Successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }

    public function destroy($id)
    {

        $order_qty = Order::where('listing_id', $id)->count();

        if($order_qty > 0){
            $notify_message = trans('translate.Multiple order created under it, so you can not delete it');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $listing = Listing::findOrFail($id);
        $old_image = $listing->thumb_image;

        if($old_image){
            if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        }

        ListingTranslation::where('listing_id',$id)->delete();

        $galleries = ListingGallery::where('listing_id', $id)->get();
        foreach($galleries as $gallery){
            $old_image = $gallery->image;

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }

            $gallery->delete();
        }

        $listing->delete();

        $notify_message=  trans('translate.Delete Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.listings.index')->with($notify_message);
    }

    public function listing_gallery($id){
        $listing = Listing::findOrFail($id);

        $galleries = ListingGallery::where('listing_id', $id)->get();

        return view('listing::gallery', compact('listing', 'galleries'));
    }

    public function upload_listing_gallery(Request $request, $id){

        foreach ($request->file as $index => $image) {
            $gallery_image = new ListingGallery();

            if($image){
                $image_name = 'listing-gallery'.date('-Y-m-d-h-i-s-').rand(999,9999).$index.'.webp';
                $image_name ='uploads/custom-images/'.$image_name;
                Image::make($image)
                    ->encode('webp', 80)
                    ->save(public_path().'/'.$image_name);
                $gallery_image->image = $image_name;
            }

            $gallery_image->listing_id = $id;
            $gallery_image->save();
        }

        if ($gallery_image) {
            return response()->json([
                'message' => trans('translate.Images uploaded successfully'),
                'url' => route('admin.listings-gallery', $id),
            ]);
        } else {
             return response()->json([
                'message' => trans('translate.Images uploaded Failed'),
                'url' => route('admin.listings-gallery', $id),
            ]);
        }

    }

    public function delete_listing_gallery($id){
        $gallery = ListingGallery::findOrFail($id);
        $old_image = $gallery->image;

        if($old_image){
            if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        }

        $gallery->delete();

        $notify_message=  trans('translate.Delete Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }

    public function setup_language($lang_code){
        $listing_translates = ListingTranslation::where('lang_code', admin_lang())->get();
        foreach($listing_translates as $listing_translate){
            $translate = new ListingTranslation();
            $translate->listing_id = $listing_translate->listing_id;
            $translate->lang_code = $lang_code;
            $translate->title = $listing_translate->title;
            $translate->description = $listing_translate->description;
            $translate->save();
        }
    }

    public function listings_approval($id){

        $listing = Listing::findOrFail($id);
        $listing->approved_by_admin = 'approved';
        $listing->status = 'enable';
        $listing->save();

        $notify_message=  trans('translate.Apporval Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }

    public function listings_featured($id){

        $listing = Listing::findOrFail($id);
        $listing->is_featured = 'enable';
        $listing->save();

        $notify_message=  trans('translate.Featured Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }

    public function listings_featured_removed($id){

        $listing = Listing::findOrFail($id);
        $listing->is_featured = 'disable';
        $listing->save();

        $notify_message=  trans('translate.Featured removed Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }

    public function getSubcategories($categoryId)
    {
        $subcategories = SubCategory::where('category_id', $categoryId)
                                    ->with('translate')
                                    ->get();

        return response()->json($subcategories);
    }

}

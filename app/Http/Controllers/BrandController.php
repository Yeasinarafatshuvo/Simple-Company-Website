<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\MultiPicture;
use Illuminate\Support\Carbon;
use Image;
use Auth;
class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllBrand()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function StoreBrand(Request $request)
    {
         //validation
         $validateData = $request->validate([
            'brand_name' => 'required | unique:brands| max:255', 
            'brand_image' => 'required |mimes:jpg,jpeg,png', 

        ]);

        
         $brand_image = $request->file('brand_image');
         //without package custome code for image upload 
        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($brand_image->getClientOriginalExtension ());
        // $img_name = $name_gen. '.' .$img_ext;
        // $up_location = 'images/brand/';
        // $last_img = $up_location.$img_name;
        // $brand_image->move($up_location, $img_name);

        //with image intervention package upload image
        $name_gen = hexdec(uniqid()). '.' .$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300, 200)->save('images/brand/'.$name_gen);
        $last_img = 'images/brand/'.$name_gen;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with( $notification);

    }

    public function Edit($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }


    public function UpdateBrand(Request $request, $id)
    {
         //validation
         $validateData = $request->validate([
            'brand_name' => 'required | max:255', 

        ]);

        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');

        if($brand_image)
        {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen. '.' .$img_ext;
            $up_location = 'images/brand/';
            $last_img = $up_location.$img_name;
            $brand_image->move($up_location, $img_name);
            unlink($old_image);
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'info'
            );
    
            return Redirect()->back()->with($notification);
        }
        else 
        {

            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);
    
            return Redirect()->back()->with('success', 'Brand Updated Successfully');
        }
       

    }


    public function DeleteBrand($id)
    {
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);
        Brand::find($id)->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'warning'
        );
        return Redirect()->back()->with($notification);

    }


    //This is for multi Image All Methods
    public function MultiPic()
    {
        $images = MultiPicture::all();
        return view('admin.multipic.index', compact('images'));
    }


    public function StoreImage(Request $request)
    {

        $image = $request->file('image');
        foreach($image as $multi_img)
        {

        
        //with image intervention package upload image
        $name_gen = hexdec(uniqid()). '.' .$multi_img->getClientOriginalExtension();
       
        Image::make($multi_img)->resize(300, 300)->save('images/multi/'.$name_gen);
        $last_img = 'images/multi/'.$name_gen;
       
        MultiPicture::insert([
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);
    }

        return Redirect()->back()->with('success', 'Brand Inserted Successfully');
    }


    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login')->with('success', 'User Logout');
    }
}

<?php

namespace App\Http\Controllers\backend;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\subCategory;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;

class ProductController extends Controller
{

    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd(Auth::user()->vendor->id);
        $request->validate([
            'name' => 'required|max:100',
            'image' => 'required|max:3000|image',
            'category' => 'required',
            'sub_category' => 'required',
            'child_category' => 'required',
            'brand' => 'required',
            'qty' => 'required|min:0',
            'sku' => 'required',
            'price' => 'required',
            'video_link' => 'nullable|url',
            'short_description' => 'required|max:200',
            'long_description' => 'required|max:600',
            'seo_title' => 'required|max:200',
            'seo_description' => 'required|max:600',
            'status' => 'required',
        ]);

        $product = new Product();

        /**Upload Banner */
        $imagepath = $this->uploadImage($request, 'image', 'uploards');

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->thum_image = $imagepath;
        $product->vendor_id = Auth::user()->vendor->id;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->child_category_id = $request->child_category;
        $product->brand_id = $request->brand;
        $product->qyt = $request->qty;
        $product->long_description = $request->long_description;
        $product->short_description = $request->short_description;
        $product->video_link = $request->video_link;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->offer_start_date = $request->offer_start_date;
        $product->offer_end_date = $request->offer_end_date;
        $product->product_type = $request->product_type;
        $product->status = $request->status;
        $product->is_approved = 1;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;

        $product->save();

        toastr('Creates Successfully!','success');
        return redirect()->route('admin.products.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrfail($id);
        // dd($product);
        $subcategories = subCategory::where('category_id', $product->category_id)->get();
        $childcategories = ChildCategory::where('sub_category_id', $product->sub_category_id)->get();
        return view('admin.product.edit', compact('categories', 'brands', 'product', 'subcategories', 'childcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:100',
            'image' => 'nullable|max:3000|image',
            'category' => 'required',
            'sub_category' => 'required',
            'child_category' => 'required',
            'brand' => 'required',
            'qty' => 'required|min:0',
            'sku' => 'required',
            'price' => 'required',
            'video_link' => 'nullable|url',
            'short_description' => 'required|max:200',
            'long_description' => 'required|max:600',
            'seo_title' => 'required|max:200',
            'seo_description' => 'required|max:600',
            'status' => 'required',
        ]);

        $product = Product::findOrFail($id);
        // dd($product);

        /**Update image */
        $imagepath = $this->updateImage($request, 'image', 'uploards', $product->thum_image);

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->thum_image = empty(!$imagepath) ? $imagepath : $product->thum_image;
        $product->vendor_id = Auth::user()->vendor->id;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->child_category_id = $request->child_category;
        $product->brand_id = $request->brand;
        $product->qyt = $request->qty;
        $product->long_description = $request->long_description;
        $product->short_description = $request->short_description;
        $product->video_link = $request->video_link;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->offer_start_date = $request->offer_start_date;
        $product->offer_end_date = $request->offer_end_date;
        $product->product_type = $request->product_type;
        $product->status = $request->status;
        $product->is_approved = 1;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;

        $product->save();

        toastr('Updated Successfully!','success');
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        // dd($product);

        // delete slider from database
        $this->deleteImage($product->thum_image);

        $product->delete();

        return response(['status'=>'success', 'message'=>'Deleted Successfully!']);
    }

    /**load sub-Category from database */
    public function getSubCategory(Request $request){
        $subcategories = subCategory::where('category_id', $request->id)->where('status', 1)->get();
        return $subcategories;
    }

    /**load child-Category from database */
    public function getChildCategory(Request $request){
        $subcategories = ChildCategory::where('sub_category_id', $request->id)->where('status', 1)->get();
        return $subcategories;
    }
}

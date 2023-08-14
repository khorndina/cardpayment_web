<?php

namespace App\Http\Controllers\backend;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {
        // return view('admin.slider.index');
        return $dataTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'banner' => 'required|file|max:2500',
            'type' => 'string|max:100',
            'title' => 'required|max:100',
            'starting_price' => 'max:200',
            'button_url' => 'url',
            'serail' => 'required|integer',
            'status' => 'required',
        ]);

        $slider = new Slider();

        /**Upload Banner */
        $imagepath = $this->uploadImage($request, 'banner', 'uploards');

        $slider->banner = $imagepath;
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->button_url = $request->button_url;
        $slider->serail = $request->serail;
        $slider->status = $request->status;

        $slider->save();

        toastr('Slider was created Successfully', 'success');
        return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

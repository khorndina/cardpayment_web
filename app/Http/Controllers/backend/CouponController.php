<?php

namespace App\Http\Controllers\backend;

use App\DataTables\CouponDataTable;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CouponDataTable $dataTable)
    {
        return $dataTable->render('admin.coupon.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(($request->all()));
        $request->validate([
            'name' => 'required|max:200',
            'code' => 'required',
            'quantity' => 'required',
            'max_use' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'discount_type' => 'required',
            'discount' => 'required',
            'status' => 'required',
        ]);

        $coupon = new Coupon();

        $coupon->name = $request->name;
        $coupon->quantity = $request->quantity;
        $coupon->code = $request->code;
        $coupon->max_use = $request->max_use;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->discount_type = $request->discount_type;
        $coupon->discount_value = $request->discount;
        $coupon->total_use = 0;
        $coupon->status = $request->status;

        $coupon->save();

        toastr('Creates Successfully!','success');
        return redirect()->route('admin.coupons.index');
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

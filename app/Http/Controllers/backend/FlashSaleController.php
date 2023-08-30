<?php

namespace App\Http\Controllers\backend;

use App\DataTables\FlashSaleItemDataTable;
use App\DataTables\FlashSaleItemsDataTable;
use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\Product;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index(FlashSaleItemsDataTable $dataTable)
    {
        $flashSaleEndDate = FlashSale::first();
        $products = Product::where('status', 1)->where('is_approved', 1)->get();
        return $dataTable->render('admin.flash-sale.index', compact('flashSaleEndDate', 'products'));
    }

    public function update(Request $request){
        // dd($request->all());
        $request->validate([
            'end_date' => 'required|date',
        ]);

        FlashSale::updateOrCreate(
            ['id' => 1],
            ['end_date' => $request->end_date]
        );

        toastr('Flash Sale Updated Successfully!','success');
        return redirect()->back();
    }

    public function addProduct(Request $request){
        // dd($request->all());
        $request->validate([
            'product' => 'required|integer|unique:flash_sale_items,product_id',
            'show_at_home' => 'required|integer',
            'status' => 'required|integer',
        ], [
            'product.unique' => 'The product is already added to flash Sale'
        ]);

        $flashSaleEndDate = FlashSale::first();
        $flashSaleItem = new FlashSaleItem();
        $flashSaleItem->product_id = $request->product;
        $flashSaleItem->show_at_home = $request->show_at_home;
        $flashSaleItem->status = $request->status;
        $flashSaleItem->flash_sale_id = $flashSaleEndDate->id;
        $flashSaleItem->save();

        toastr('Data Saved Successfully!','success');
        return redirect()->back();
    }


    public function changestatus(Request $request){
        // dd($request->all());
        // we can debuge result of $request on inspect in tab Network

        $flashSaleItem = FlashSaleItem::findOrFail($request->id);
        $flashSaleItem->status = $request->ischecked == "true" ? 1 : 0;
        $flashSaleItem->save();

        return response(['message'=>'status has been updated!']);
    }


    public function showAtHome(Request $request){
        // dd($request->all());
        // we can debuge result of $request on inspect in tab Network

        $flashSaleItem = FlashSaleItem::findOrFail($request->id);
        $flashSaleItem->show_at_home = $request->ischecked == "true" ? 1 : 0;
        $flashSaleItem->save();

        return response(['message'=>'Show at home has been updated!']);
    }


    public function destroy(string $id)
    {
        $flashSaleItem = FlashSaleItem::findOrFail($id);
        // dd($flashSaleItem);

        $flashSaleItem->delete();
        return response(['status'=>'success', 'message'=>'Deleted Successfully!']);
    }
}

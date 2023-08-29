<?php

namespace App\Http\Controllers\backend;

use App\DataTables\FlashSaleItemDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index(FlashSaleItemDataTable $dataTable)
    {
        return $dataTable->render('admin.flash-sale.index');
    }
}

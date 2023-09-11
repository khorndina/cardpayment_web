<?php

namespace App\Http\Controllers\frontend;

use App\DataTables\PaymentDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionManagementController extends Controller
{
    public function index(PaymentDataTable $dataTable)
    {
        return $dataTable->render('frontend.page.transactiondata');
    }
}

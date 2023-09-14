<?php

namespace App\DataTables;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PaymentDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                $btnComplete = "<a href='".route('vendor.products.edit', $query->id)."' class='btn btn-primary ml-2'> Complete </a>";
                $btnRefund = "<a href='".route('vendor.products.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'> Refund </a>";
                $btnReverse = "<a href='".route('vendor.products.destroy', $query->id)."' class='btn btn-warning ml-2 delete-item'> Reverse </a>";

                return $btnComplete.$btnRefund.$btnReverse;
            })
            ->addColumn('pan', function($query){
                $masked_pan = substr($query->pan, 0, 6) . str_repeat('*', 6) . substr($query->pan, -4);
                return $masked_pan;
            })
            ->addColumn('order_date', function($query){
                return $query->created_at->format('d-m-Y');
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Payment $model): QueryBuilder
    {
        return $model->where('user_id', Auth::user()->id)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('payment-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0, 'desc')
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('orderId'),
            Column::make('sessionId'),
            Column::make('mid'),
            Column::make('pan'),
            Column::make('amount'),
            Column::make('orderstatus'),
            // Column::make('payment_type'),
            Column::make('order_date'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(300)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Payment_' . date('YmdHis');
    }
}

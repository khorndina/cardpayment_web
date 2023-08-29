<?php

namespace App\DataTables;

use App\Models\ProductVariant;
use App\Models\VendorProductVariant;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorProductVariantDataTable extends DataTable
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
                $VariantItems = "<a href='".route('vendor.product-variant-item.index',  ['productid'=>request()->id, 'variantId'=>$query->id])."' class='btn btn-info btn-margin-right'> Variant-Items </a>";
                $EditBtn = "<a href='".route('vendor.product-variant.edit', $query->id)."' class='btn btn-primary ml-2'> Edit </a>";
                $DeleteBtn = "<a href='".route('vendor.product-variant.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'> Delete </a>";
                return $VariantItems.$EditBtn.$DeleteBtn;
            })
            ->addColumn('status', function($query){
                if($query->status == 0){
                    // $status = '<label class="custom-switch mt-2">
                    //         <input type="checkbox" name="custome-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status">
                    //         <span class="custom-switch-indicator"></span>
                    //     </label>';
                    $status = '<div class="form-check form-switch">
                                    <input class="form-check-input change-status" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-id="'.$query->id.'">
                                </div>';
                    return $status;
                }else{
                    // $status = '<label class="custom-switch mt-2">
                    //         <input type="checkbox" name="custome-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status" checked>
                    //         <span class="custom-switch-indicator"></span>
                    //     </label>';
                    $status = '<div class="form-check form-switch">
                                    <input class="form-check-input change-status" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-id="'.$query->id.'" checked>
                                </div>';
                    return $status;
                }
            })
            ->rawColumns(['action', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductVariant $model): QueryBuilder
    {
        return $model->where('product_id', $this->productId)->newQuery();
        // below is default from laravel
        // return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('vendorproductvariant-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
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
            Column::make('id'),
            Column::make('name'),
            Column::make('status'),
            // Column::make('product_id'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(350)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'VendorProductVariant_' . date('YmdHis');
    }
}

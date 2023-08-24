<?php

namespace App\DataTables;

use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductVariantDataTable extends DataTable
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
                $VariantItems = "<a href='".route('admin.products.destroy', $query->id)."' class='btn btn-info ml-2 delete-item'> Variant-Items </a>";
                $EditBtn = "<a href='".route('admin.product-variant.edit', $query->id)."' class='btn btn-primary ml-2'> Edit </a>";
                $DeleteBtn = "<a href='".route('admin.product-variant.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'> Delete </a>";
                return $VariantItems.$EditBtn.$DeleteBtn;
            })
            ->addColumn('status', function($query){
                if($query->status == 0){
                    $status = '<label class="custom-switch mt-2">
                            <input type="checkbox" name="custome-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status">
                            <span class="custom-switch-indicator"></span>
                        </label>';
                    return $status;
                }else{
                    $status = '<label class="custom-switch mt-2">
                            <input type="checkbox" name="custome-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status" checked>
                            <span class="custom-switch-indicator"></span>
                        </label>';
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
                    ->setTableId('productvariant-table')
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
            Column::make('id')->width(200),
            Column::make('name'),
            Column::make('status'),
            // Column::make('product_id'),
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
        return 'ProductVariant_' . date('YmdHis');
    }
}

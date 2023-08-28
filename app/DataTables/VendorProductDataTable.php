<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorProductDataTable extends DataTable
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
                $EditBtn = "<a href='".route('vendor.products.edit', $query->id)."' class='btn btn-primary ml-2'> Edit </a>";
                $DeleteBtn = "<a href='".route('vendor.products.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'> Delete </a>";
                $settingBtn ='<div class="dropdown d-inline dropleft">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item has-icon" href="'.route('admin.product-image-gallery.showtable', $query->id).'"><i class="far fa-heart"></i>Image Gallery</a>
                                <a class="dropdown-item has-icon" href="'.route('admin.product-variant.showtable', $query->id).'"><i class="far fa-file"></i>Product Variant</a>
                                <a class="dropdown-item has-icon" href="#"><i class="far fa-clock"></i> Something else here</a>
                                </div>
                            </div>';
                return $EditBtn.$DeleteBtn.$settingBtn;
            })
            ->addColumn('produc_image', function($query){
                return "<img width='20%' src='".asset($query->thum_image)."'></img>";
            })
            ->addColumn('product_type', function($query){
                switch ($query->product_type) {
                    case 'new_arrival':
                        return '<i class="badge bg-success">New Arrival</i>';
                        break;
                    case 'featured_product':
                            return '<i class="badge bg-warning">Featured</i>';
                            break;
                    case 'top_product':
                            return '<i class="badge bg-info">Top Product</i>';
                            break;
                    case 'best_product':
                        return '<i class="badge bg-danger">Best Product</i>';
                        break;

                    default:
                        return '<i class="badge bg-dark">None</i>';
                        break;
                }
            })
            ->addColumn('status', function($query){
                if($query->status == 0){
                    // $status = '<label class="custom-switch mt-2">
                    //         <input type="checkbox" name="custome-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status">
                    //         <span class="custom-switch-indicator"></span>
                    //     </label>';
                    $status = '<div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                </div>';
                    return $status;
                }else{
                    // $status = '<label class="custom-switch mt-2">
                    //                 <input type="checkbox" name="custome-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status" checked>
                    //                 <span class="custom-switch-indicator"></span>
                    //             </label>';
                    $status = '<div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                                </div>';
                    return $status;
                }
            })
            ->rawColumns(['action', 'status', 'produc_image', 'product_type'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->where('vendor_id', Auth::user()->vendor->id)->newQuery();
        // below query is default from laravel
        // return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('vendorproduct-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
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
            Column::make('id')->width(50),
            Column::make('produc_image')->width(200),
            Column::make('name'),
            Column::make('price'),
            Column::make('product_type'),
            Column::make('status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'VendorProduct_' . date('YmdHis');
    }
}

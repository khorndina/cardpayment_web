<?php

namespace App\DataTables;

use App\Models\GeneralSetting;
use App\Models\ShippingRule;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ShippingRuleDataTable extends DataTable
{

    protected $currencyIcon = '';

    public function __construct(){
        $this->currencyIcon = GeneralSetting::first()->currency_icon;
    }

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                // @phpcs:disable
                $EditBtn = "<a href='".route('admin.shipping-rule.edit', $query->id)."' class='btn btn-primary ml-2'> Edit </a>";
                $DeleteBtn = "<a href='".route('admin.shipping-rule.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'> Delete </a>";
                return $EditBtn.$DeleteBtn;
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
            ->addColumn('shipping_type', function($query){
                switch ($query->type) {
                    case 'min_cost':
                        return '<i class="badge badge-success">Minimum Order Amount</i>';
                        break;
                    case 'flat_cost':
                            return '<i class="badge badge-warning">Flate Amount</i>';
                            break;
                    default:
                        return '<i class="badge badge-dark">None</i>';
                        break;
                }
            })
            ->addColumn('minimum_cost', function($query){
                if($query->type === 'min_cost'){
                    return $this->currencyIcon.$query->min_cost;
                }else{
                    return $this->currencyIcon.'0';
                }
            })
            ->addColumn('cost', function($query){
                    return $this->currencyIcon.$query->cost;
            })
            ->rawColumns(['status', 'action', 'shipping_type', 'minimum_cost'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ShippingRule $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('shippingrule-table')
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
            Column::make('id'),
            Column::make('name'),
            Column::make('shipping_type'),
            Column::make('minimum_cost'),
            Column::make('cost'),
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
        return 'ShippingRule_' . date('YmdHis');
    }
}

<?php

namespace App\DataTables;

use App\Models\Utilisateur;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        return datatables()
            ->eloquent($query)
            ->addColumn('edit', function ($user) {
                return '<a href="' . route('editUser', $user->id) . '" class="btn btn-sm btn-warning btn-block">Modifier</a>';
            })
            ->addColumn('destroy', function ($user) {
                return '<a href="' . route('users.destroy', $user->id) . '" class="btn btn-sm btn-danger btn-block">Supprimer</a>';
            })
            ->rawColumns(['edit', 'destroy']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Utilisateur $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('utilisateurs-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->lengthMenu()
            ->language('//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json');
            // ->buttons(
            //     Button::make('create'),
            //     Button::make('export'),
            //     Button::make('print'),
            //     Button::make('reset'),
            //     Button::make('reload')
            // );
    }
    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            // Column::computed('action')
            //     ->exportable(false)
            //     ->printable(false)
            //     ->width(60)
            //     ->addClass('text-center'),
            // Column::make('id'),
            // Column::make('add your columns'),

            Column::make('id')->title('#'),
            Column::make('name')->title('Nom'),
            Column::make('firstname')->title('Prénoms'),
            Column::make('email')->title('Email'),
            Column::make('created_at')->title('Created Date'),
            Column::make('updated_at')->title('Updated Date'),
            Column::computed('edit')
                ->title('')
                ->width(60)
                ->addClass('text-center'),
            Column::computed('destroy')
                ->title('')
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');//YmdHis
    }
}

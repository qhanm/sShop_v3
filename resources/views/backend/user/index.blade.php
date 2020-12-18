@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                        /** @var $dataProvider \Libs\DataTable\DataProvider\DataProvider */

                        $dataTable = [
                            'dataProvider' => $dataProvider,
                            'columns' => [
                                'id',
                                'name',
                                'email',
                                [
                                    'label' => 'Role',
                                    'attribute' => 'roles',
                                    'sort' => false,
                                    'filter' => false,
                                    'value' => function($model){
                                        return 'admin';
                                    }
                                ]
                            ]
                        ];

                        echo (new \Libs\DataTable\DataTable($dataTable))->render();
                    ?>
                </div>
            </div>
        </div>
    </div>

@endsection

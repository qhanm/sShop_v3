@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {!! $datatable !!}
                </div>
            </div>
        </div>
    </div>

@endsection

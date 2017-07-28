@extends('layouts.admin')

@section('title', 'Nuevo Trabajo - Presupuesto')

@section('contenido')
    <section class="content-header">
        <h1>
            <small>
            </small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard">
                    </i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">
                    Examples
                </a>
            </li>
            <li class="active">
                Blank page
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        {!! Form::open(['route' => 'orders.store', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        @include('common.errors')
                        <h3 class="box-title">Nuevo Trabajo - Presupuesto</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            @include('orders.partials.fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="for text-center">
            <a class="btn btn-danger" href="{{ route('orders.index')}}">
                Cancelar
            </a>
            {!! Form::button('Registrar', ['class'=> 'btn btn-primary', 'onClick'=>'submit();']) !!}
        </div>
        {!! Form::close() !!}
    </section>

    @include('orders.modals.product-recommended-modal')
    @include('orders.modals.product-create-modal')
    @include('orders.modals.service-modal')
    @include('orders.modals.vehicle-edit-modal')
    @include('orders.modals.client-edit-modal')


@endsection


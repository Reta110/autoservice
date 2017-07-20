@extends('layouts.admin')

@if($order->status != 'ended')
    @section('title', 'Editar Trabajo')
@else
    @section('title', 'Trabajo Finalizado')
@endif
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
                    Orden
                </a>
            </li>
            <li>
                <a href="#">
                    Editar Orden Nr. #0{{ $order->id }}
                </a>
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        {!! Form::model($order, ['route' => ['orders.update', $order], 'method' => 'PUT']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        @include('common.errors')
                        @if($order->status != 'ended')
                            <h3 class="box-title">Editar Trabajo</h3>
                        @else
                            <h3 class="box-title">Trabajo Finalizado</h3>
                        @endif
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            @include('orders.partials.fields_edit')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="for text-center">
            <a class="btn btn-danger" href="{{ route('orders.index')}}">
                Cancelar
            </a>
            {!! Form::button('Enviar', ['class'=> 'btn btn-primary', 'onClick'=>'submit();']) !!}
        </div>
        {!! Form::close() !!}
    </section>

    @include('orders.modals.product-recommended-modal')
    @include('orders.modals.product-create-modal')
    @include('orders.modals.service-modal')
    @include('orders.modals.vehicle-edit-modal')

@endsection

@section('js')

@endsection

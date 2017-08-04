@extends('layouts.admin')

@section('title', 'Cierre de Mes')
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
                    Agregar
                </a>
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="service-saved">
            <div class="info no-print notification  alert alert-success" hidden>Guardado con exito!!</div>
        </div>

        <div class="row">
            <div class="service-saved">
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        @include('common.errors')
                        <h3 class="box-title">Cierre de Mes</h3>
                        <div class="box-tools">

                            <div class="text-center">
                                <a class="btn btn-warning btn-sm" href="{{ route('fixed-expenses.index') }}">
                                    VOLVER
                                </a>
                            </div>

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            @if(count($fixedExpenses))
                                @include('fixed-expenses.partials.fieldsToClose')
                            @else
                                <div class="alert alert-danger col-md-10 text-center">No se registraron Gastos fijos el mes pasado.</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('js')

@endsection

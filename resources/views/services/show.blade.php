@extends('layouts.admin')

@section('title', 'Detalles del servicio')

@section('contenido')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                Detalles del servicio
            </h3>
            <div class="box-tools">

                <div class="text-center">
                    <a class="btn btn-success btn-sm" href="{{ route('services.index') }}">
                        Volver
                    </a>
                </div>

            </div>
        </div>
        <div class="box-body">
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-solid box-primary">
                    <div class="box-header with-border">
                        @include('common.errors')
                    </div>
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>Id:</td>
                            <td>{{ $service->id }}</td>
                        </tr>
                        <tr>
                            <td>Código:</td>
                            <td>{{ $service->code }}</td>
                        </tr>
                        <tr>
                            <td>Nombre:</td>
                            <td>{{ $service->name }}</td>
                        </tr>
                        <tr>
                            <td>Precio referencia:</td>
                            <td>{{ $service->hh }}</td>
                        </tr>
                        <tr>
                            <td>Descripción:</td>
                            <td>{{ $service->description }}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="for text-center">
        <a class="btn btn-success btn-sm" href="{{ route('services.index') }}">
            Regresar
        </a>
    </div>
@endsection
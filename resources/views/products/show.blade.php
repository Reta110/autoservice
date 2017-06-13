@extends('layouts.admin')

@section('title', 'Detalles del producto')

@section('contenido')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                Detalles del producto
            </h3>
            <div class="box-tools">

                <div class="text-center">
                    <a class="btn btn-success btn-sm" href="{{ route('products.index') }}">
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
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <td>Código:</td>
                            <td>{{ $product->code }}</td>
                        </tr>
                        <tr>
                            <td>Nombre:</td>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <td>Precio referencia:</td>
                            <td>{{ $product->price }}</td>
                        </tr>
                        <tr>
                            <td>Precio a usar:</td>
                            <td>{{ $product->price_to_use }}</td>
                        </tr>
                        <tr>
                            <td>Marca:</td>
                            <td>{{ $product->brand }}</td>
                        </tr>
                        <tr>
                            <td>Modelo:</td>
                            <td>{{ $product->model }}</td>
                        </tr>
                        <tr>
                            <td>Stock:</td>
                            <td>{{ $product->stock }}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="for text-center">
        <a class="btn btn-success btn-sm" href="{{ route('products.index') }}">
            Regresar
        </a>
    </div>
@endsection
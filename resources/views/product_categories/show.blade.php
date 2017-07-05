@extends('layouts.admin')

@section('title', 'Detalles de categoria')

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

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Detalles de la categoria
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
                                <td>{{ $category->id }}</td>
                            </tr>
                            <tr>
                                <td>Nombre:</td>
                                <td>{{ $category->name }}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="for text-center">
            <a class="btn btn-success btn-sm" href="{{ route('categories.index') }}">
                Regresar
            </a>
        </div>
    </section>

@endsection
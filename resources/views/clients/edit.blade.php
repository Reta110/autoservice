@extends('layouts.admin')

@section('title', 'Editar Cliente')

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
                    Admin
                </a>
            </li>
            <li>
                <a href="#">
                    Clientes
                </a>
            </li>
            <li class="active">
                Editar
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        {!! Form::model($client, ['route' => ['clients.update', $client], 'method' => 'PUT']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        @include('common.errors')
                        <h3 class="box-title">Editar Cliente</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            @include('clients.partials.fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="for text-center">
            {!! Form::submit('Actualizar', ['class'=> 'btn btn-primary']) !!}
            <a class="btn btn-danger" href="{{ route(session()->get('back')) }}">
                Cancelar
            </a>
        </div>
        {!! Form::close() !!}
    </section>

@endsection

@section('js')

@endsection

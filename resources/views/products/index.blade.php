@extends('layouts.admin')

@section('title', 'Listado de empleados')

@section('contenido')
    <div class="box">
        @include('common.success')
        <div class="box-header with-border">
            <h3 class="box-title">
                Listado de productos
            </h3>
            <div class="box-tools">

                <div class="text-center">
                    <a class="btn btn-danger btn-sm" href="{{ route('products.create') }}">
                        NUEVO REGISTRO
                    </a>
                    {{--  <a class="btn btn-success btn-sm" href="{{route('export')}}">
                        IMPRIMIR REPORTE
                    </a> --}}
                </div>

            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover display table-responsive table-condensed" id="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>CODIGO</th>
                                <th>NOMBRE</th>
                                <th>PRECIO REFERENCIA</th>
                                <th>PRECIO A USAR</th>
                                <th>MARCA</th>
                                <th>MODELO</th>
                                <th>STOCK</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        {{ $product->id }}
                                    </td>
                                    <td>
                                        {{ $product->code }}
                                    </td>
                                    <td>
                                        {{ $product->name }}
                                    </td>
                                    <td>
                                        {{ $product->price }}
                                    </td>
                                    <td>
                                        {{ $product->price_to_use }}
                                    </td>
                                    <td>
                                        {{ $product->brand }}
                                    </td>
                                    <td>
                                        {{ $product->model }}
                                    </td>
                                    <td>
                                        {{ $product->stock }}
                                    </td>
                                    <td>
                                        <a href="{{ route('products.show', $product) }}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('products.edit', $product) }}">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        {!! Form::open(['route' => ['products.destroy',$product ], 'method' => 'DELETE' ]) !!}
                                        <button type="submit" class="btn btn-link">
                                            <i class="fa fa-trash" aria-hidden="true"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <!-- footer-->
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table').DataTable({
                "language": {
                    "url": "{{ asset('AdminLTE/plugins/datatables/esp.lang') }}"
                }
            });
        });
    </script>
@endsection
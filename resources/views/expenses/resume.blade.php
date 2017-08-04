@extends('layouts.admin')

@section('title', 'Resumen de Gastos Administrativos del mes')

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
                    Resumen de Gastos del mes
                </a>
            </li>
            <li>
                <a href="#">
                    Listado
                </a>
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="box">
            @include('common.success')
            <div class="box-header with-border">
                <h3 class="box-title">
                    Resumen de Gastos del mes
                </h3>
                <div class="box-tools">

                    <div class="text-center">

                    </div>

                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-6">
                        <h2>Gastos en insumos <p class="text-green money">{{$expenses}}</p></h2>

                    </div>
                    <div class="col-xs-6">
                        <h2>Gastos fijos mensuales <p class="text-green money">{{$fixedExpenses}}</p></h2>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <!-- footer-->
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
                <div class="row">
                    <div class="col-xs-6">
                        <h2>Comisión en TDD <p class="text-green money">{{$debit_comision}}</p></h2>

                    </div>
                    <div class="col-xs-6">
                        <h2>Comisión TDC <p class="text-green money">{{$credit_comision}}</p></h2>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <!-- footer-->
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>

@endsection

@section('js')

    <script type="text/javascript">
        $(document).ready(function () {
            $('.table').DataTable({
                "language": {
                    "url": "{{ asset('AdminLTE/plugins/datatables/esp.lang') }}",
                },
                "order": [[0, "desc"]],
                "paging": false,
                "sScrollX": "100%"
            });
        });
    </script>
@endsection
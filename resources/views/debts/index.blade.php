@extends('layouts.admin')

@section('title', 'Deudas por cobrar')

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
                    Deudas por cobrar
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
                    Deudas poro cobrar
                </h3>
                <div class="box-tools">

                    <div class="text-center">

                    </div>

                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-6">
                        <h2>Deudores por cobrar <p class="text-green money">{{$total_orders}}</p></h2>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover display table-responsive table-condensed" id="table">
                                <thead>
                                <tr>
                                    <th>CLIENTE</th>
                                    <th>TOTAL</th>
                                    <th>ENTREGADO</th>
                                    <th>ACCIONES</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            {{ $order->user->name.' '.$order->user->last_name}}
                                        </td>
                                        <td>
                                            {{ $order->total }}
                                        </td>
                                        <td>
                                            {{ $order->ended_date }}
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group">
                                                <a href="{{ route('orders.show', $order) }}" title="Ver orden">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="col-xs-6">
                        <h2>Cuotas por cobrar</h2>
                        <h4>TRANSBANCK  <p class="text-green money">{{ $total_transbanks }}</p></h4>
                        @if(count($transbanks) > 0)
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover display table-responsive table-condensed"
                                       cellspacing="0"
                                       id="table2">
                                    <thead>
                                    <tr>
                                        <th>CLIENTE</th>
                                        <th>TOTAL</th>
                                        <th>FECHA DE COBRO</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transbanks as $transbank)
                                        @for($i=$transbank->pay_fees_quantity;$i>0;$i--)
                                            <tr @if(\Carbon\Carbon::parse($transbank->ended_date)
                                                    ->addMonth($i) < \Carbon\Carbon::now()) class="success" @endif>
                                                <td>
                                                    {{ $transbank->user->name.' '.$transbank->user->last_name}}
                                                </td>
                                                <td>
                                                    {{ $transbank->total / $transbank->pay_fees_quantity}}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($transbank->ended_date)
                                                        ->addMonth($i)->format('d-m-Y') }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="form-group">
                                                        <a href="{{ route('orders.show', $transbank) }}"
                                                           title="Ver orden">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endfor
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="bg-danger">No hay transacciones pendientes.</p>
                        @endif

                        <h4>CHEQUES  <p class="text-green money">{{ $total_checks }}</p></h4>
                        @if(count($checks) > 0)
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover display table-responsive table-condensed" id="table2">
                                    <thead>
                                    <tr>
                                        <th>CLIENTE</th>
                                        <th>TOTAL</th>
                                        <th>FECHA DE COBRO</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($checks as $check)
                                        @for($i=$check->pay_fees_quantity;$i>0;$i--)
                                            <tr @if(\Carbon\Carbon::parse($check->ended_date)
                                                    ->addMonth($i) < \Carbon\Carbon::now()) class="success" @endif>
                                                <td>
                                                    {{ $check->user->name.' '.$check->user->last_name}}
                                                </td>
                                                <td>
                                                    {{ $check->total / $check->pay_fees_quantity}}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($check->ended_date)
                                                            ->addMonth($i)->format('d-m-Y') }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="form-group">
                                                        <a href="{{ route('orders.show', $check) }}" title="Ver orden">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endfor
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="bg-danger">No hay cheques pendientes.</p>
                    @endif
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
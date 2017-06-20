<!-- Modal -->
<div class="modal fade" id="myServiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => 'products.store', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        @include('common.errors')
                        <h3 class="box-title">Nuevo Servicio</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            @include('services.partials.fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="for text-center">
            {!! Form::submit('Registrar', ['class'=> 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>

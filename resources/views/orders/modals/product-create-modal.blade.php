<!-- Modal -->
<div class="modal fade" id="myProductModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => 'products.store', 'method' => 'POST', 'id' => 'modal-form']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        @include('common.errors')
                        <h3 class="box-title">Nuevo Producto</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            @include('products.partials.fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="for text-center">
            <button type="button" class="btn btn-default close-modal" data-dismiss="modal">Cancelar</button>
            {!! Form::submit('Registrar', ['class'=> 'btn btn-primary','id' => 'modal-product']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
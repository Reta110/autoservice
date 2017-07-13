<!-- Modal -->
<div class="modal fade" id="myProductRecommendeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Products recomendados para este vehiculo</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover display table-responsive table-condensed"
                                   id="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>CODIGO</th>
                                    <th>NOMBRE</th>
                                    <th>COSTO</th>
                                    <th>PRECIO</th>
                                    <th>MARCA</th>
                                    <th>MODELO</th>
                                    <th>DISPONIBLE</th>
                                    <th>TAGS</th>
                                    <th>CATEGORIA</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($recommended as $product)
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
                                            {{ $product->cost }}
                                        </td>
                                        <td>
                                            {{ $product->price }}
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
                                            {{ $product->tags }}
                                        </td>
                                        <td>
                                            {{ $product->category->name }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="for text-center">
        <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>
    </div>
    </div>

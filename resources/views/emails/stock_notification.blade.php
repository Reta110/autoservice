<h2>Notificación de stock mínimo</h2>

<p>El siguiente produtcto se agotó:</p>

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
        <td>Costo:</td>
        <td>{{ $product->cost }}</td>
    </tr>
    <tr>
        <td>Precio:</td>
        <td>{{ $product->price }}</td>
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
    <tr>
        <td>Stock mínimo:</td>
        <td>{{ $product->stock_minimum }}</td>
    </tr>
    </tbody>
</table>

<p>
    <a href="{{route('products.edit',$product->id)}}">Editar los detalles de este producto.</a><br>
</p>

<div class="pull-right">
    <img src="{{ $message->embed(asset("images/logo2.png")) }}">
</div>
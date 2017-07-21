<h2>Notificación de stock mínimo</h2>

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
        <td>Stock:</td>
        <td>{{ $product->stock_minimum }}</td>
    </tr>
    </tbody>
</table>
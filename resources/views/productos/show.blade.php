@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalle del Producto</h2>
    <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
    <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
    <p><strong>Precio:</strong> {{ $producto->precio }}</p>
    <a href="{{ route('productos.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection

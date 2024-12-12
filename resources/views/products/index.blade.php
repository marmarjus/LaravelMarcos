@php
/**
 * Página de tienda
 *
 * Esta página permite ver
 * la tienda de la aplicación,
 * los productos con sus existencias
 * y precio.
 *
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */
@endphp

@extends('layout')

@section('title', 'Tienda')

@section('content')
    <div class="products">
        <h1>Nuestra mercancía</h1>

        <div class="products-list">
            @forelse ($products as $product)
                <div class="product-data">
                    <span class="product-name">{{ $product->name }}</span><br>
                    <span class="product-price">{{ $product->price }}€</span><br>
                    <span class="product-stock">{{ $product->stock }} {{ $product->stock == 1 ? 'ud.' : 'uds.' }}</span>
                </div>
            @empty
                <div class="products-empty">No hay productos disponibles.</div>
            @endforelse
        </div>

    </div>
@endsection

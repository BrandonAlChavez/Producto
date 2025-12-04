@extends('layouts.layout')

@section('title', 'Lista de Productos')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fas fa-boxes me-2"></i>Lista de Productos</span>
        <a href="{{ route('products.create') }}" class="btn btn-light">
            <i class="fas fa-plus me-2"></i>Nuevo Producto
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><strong>{{ $product->name }}</strong></td>
                        <td>{{ Str::limit($product->description, 50) }}</td>
                        <td><span class="badge bg-success">${{ number_format($product->price, 2) }}</span></td>
                        <td><span class="badge badge-stock">{{ $product->stock }} unidades</span></td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                            <p class="text-muted">No hay productos registrados</p>
                            <a href="{{ route('products.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Crear primer producto
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($products->hasPages())
    <div class="card-footer bg-white">
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
    @endif
</div>
@endsection
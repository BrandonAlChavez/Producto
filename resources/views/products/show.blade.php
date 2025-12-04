@extends('layouts.layout')

@section('title', 'Detalle del Producto')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-box me-2"></i>Detalle del Producto</span>
                <div>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit me-1"></i>Editar
                    </a>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left me-1"></i>Volver
                    </a>
                </div>
            </div>
            <div class="card-body">
                <h2 class="mb-4" style="color: var(--primary-blue);">{{ $product->name }}</h2>
                
                <div class="mb-4">
                    <h5 style="color: var(--dark);">
                        <i class="fas fa-align-left me-2"></i>Descripción
                    </h5>
                    <p class="text-muted">
                        {{ $product->description ?: 'Sin descripción disponible' }}
                    </p>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="p-3 rounded" style="background: linear-gradient(135deg, #3b82f6 0%, #1e3a8a 100%);">
                            <h6 class="text-white mb-2">
                                <i class="fas fa-dollar-sign me-2"></i>Precio
                            </h6>
                            <h3 class="text-white mb-0">
                                ${{ number_format($product->price, 2) }}
                            </h3>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="p-3 rounded" style="background: linear-gradient(135deg, #1f2937 0%, #111827 100%);">
                            <h6 class="text-white mb-2">
                                <i class="fas fa-boxes me-2"></i>Stock Disponible
                            </h6>
                            <h3 class="text-white mb-0">
                                {{ $product->stock }} unidades
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="border-top pt-3">
                    <h6 style="color: var(--dark);">
                        <i class="fas fa-info-circle me-2"></i>Información Adicional
                    </h6>
                    <p class="mb-1">
                        <strong>ID:</strong> #{{ $product->id }}
                    </p>
                    <p class="mb-1">
                        <strong>Fecha de creación:</strong> {{ $product->created_at->format('d/m/Y H:i') }}
                    </p>
                    <p class="mb-0">
                        <strong>Última actualización:</strong> {{ $product->updated_at->format('d/m/Y H:i') }}
                    </p>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning flex-fill">
                        <i class="fas fa-edit me-2"></i>Editar Producto
                    </a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="flex-fill" 
                          onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-trash me-2"></i>Eliminar Producto
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
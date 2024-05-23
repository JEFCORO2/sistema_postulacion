@extends('adminlte::page')

@section('title', 'Editar-Perfil')

@section('content_header')
    <div class="row justify-content-center mt-4">
        <div class="col-md-4 bg-white p-4 rounded shadow">
            <form action="{{ route('editar_post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" placeholder="Tu Email"
                        value="{{ auth()->user()->email }}"
                        class="form-control @error('email') is-invalid @enderror" >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tel" class="form-label">Telefono</label>
                    <input type="tel" id="tel" name="tel" placeholder="Telefono"
                        value="{{ auth()->user()->tel }}"
                        class="form-control @error('tel') is-invalid @enderror" >
                    @error('tel')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen Perfil</label>
                    <input type="file" id="imagen" name="imagen"
                        value=""
                        class="form-control"
                        accept=".jpg, .jpeg, .png" 
                    >
                </div>

                <input type="submit" value="Guardar Cambios" 
                    class="btn btn-primary btn-block mt-3"
                >
            </form>
        </div>
    </div>
@endsection
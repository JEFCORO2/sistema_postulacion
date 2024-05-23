@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Nuevo Rol
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agrega un Rol</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="nombre" class="mb-2 block uppercase text-gray-500 font-bold">
                                Nombre del Rol
                            </label>
                
                            <input type="text" id="nombre" name="nombre" placeholder="Nombre Rol"
                            value="{{old('nombre')}}"
                            class="border p-3 w-full rounded-lg @error('nombre') border-red-500                   
                            @enderror">
                
                            @error('nombre')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center w-full">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="tipo" class="mb-2 block uppercase text-gray-500 font-bold">
                                Tipo
                            </label>

                            <select class="custom-select" id="tipo" name="tipo">
                                <option selected>Selecciona</option>
                                <option value="1">Administrador</option>
                                <option value="2">Psicólogo</option>
                                <option value="3">Postulante</option>
                            </select>
                            
                            @error('tipo')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center w-full">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="sutmit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Accion</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($rols as $rol )
                <tr>
                    <td>{{$rol->id}}</td>
                    <td>{{$rol->nombre}}</td>
                    <td class="d-inline-flex">
                        <div class="mr-2">
                            <button type="button" class="btn btn-warning">
                                Actualizar
                            </button>
                        </div>

                        <div>
                            <button type="button" class="btn btn-danger">
                                Eliminar
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
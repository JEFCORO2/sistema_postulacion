@extends('adminlte::page')

@section('title', 'Postulantes')

@section('content_header')
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Gmail</th>
                <th>Telefono</th>
                <th>Estado</th>
                @if (auth()->user()->rols_id == 1)
                    <th>Rol</th>
                    <th>Acciones</th>
                @endif
                
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user )
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name .' '.$user->apellidos}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->tel}}</td>
                    @if ($user->estado)
                        <td>
                            <button type="button" class="btn btn-success">
                                Apto
                            </button>
                        </td>  
                    @else
                            <td>
                                <button type="button" class="btn btn-danger">
                                    No Apto
                                </button>
                            </td>
                    @endif
                        
                    @if (auth()->user()->rols_id == 1)
                        <td>{{$user->descripcionRol($user)}}</td>
                        <td class="d-inline-flex text-align: center">
                            <div class="mr-2">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#actualizar{{$user->id}}">
                                    Actualizar
                                </button>
                            </div>

                            <div>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar{{$user->id}}">
                                    Eliminar
                                </button>
                            </div>
                        </td>   
                    @endif
                </tr>

                @include('modales.modalActualizar')
                @include('modales.modalEliminar')
                
            @endforeach
        </tbody>
    </table>
@endsection
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
                @if (auth()->user()->rols_id == 1)
                    <th>Rol</th>
                    <th>Acciones</th>    
                @endif
                <th>Estado</th>
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
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
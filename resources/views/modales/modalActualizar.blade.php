<div class="modal fade" id="actualizar{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modalActualizar" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalActualizar">Actualiza al usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row justify-content-center mt-1">
                    <div class="">
                        <form action="{{ route('editar_post') }}" method="POST" enctype="multipart/form-data">
                            @csrf                
                            <div class="mb-3">
                                <label for="tel" class="form-label">Telefono</label>
                                <input type="tel" id="tel" name="tel" placeholder="Telefono"
                                    value="{{$user->tel}}"
                                    class="form-control @error('tel') is-invalid @enderror" >
                                @error('tel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="rol" class="form-label">Rol</label>

                                <select name="rols_id" id="rols_id" class="form-control">
                                    <option value="{{$user->rols_id}}">{{$user->rols_id}}</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Psicólogo</option>
                                    <option value="3">Postulante</option>
                                </select>

                                @error('rols_id')
                                    <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                            </div>
                            
                            <input type="submit" value="Guardar Cambios" 
                                class="btn btn-primary btn-block mt-3"
                            >
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ventana modal para eliminar -->
<div class="modal fade" id="eliminar{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEliminar">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #563d7c !important;">
            <h4 class="modal-title text-center" style="color: #fff; text-align: center;">
                <span>¿Realmente deseas eliminar al usuario?</span>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> 

        </div>

        <div class="modal-body mt-5 text-center">
          <strong style="text-align: center !important"> 
              {{ $user->name }}
          </strong>
        </div>
        
        <div class="modal-footer">
            <form action="{{ route('user.eliminar',$user->id)}}" method="POST">
                @csrf
                {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a  class="btn btn-danger" href="{{ route('user.eliminar', $user->id) }}">Borrar</a> --}}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <input type="submit"  class="btn btn-danger" value="Borrar">
            </form>
        </div>
        
        </div>
      </div>
</div>
<!---fin ventana eliminar--->

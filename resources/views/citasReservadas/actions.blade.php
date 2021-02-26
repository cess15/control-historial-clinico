@if(Auth::user()->role_id==5)
<a href="#" class="btn btn-info" data-toggle="modal" data-target="#pagada_{{$id}}">
    <i class="fa fa-dollar-sign"></i>
</a>
<div class="modal fade" id="pagada_{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Esta seguro que desea confirmar el pago?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <a href="{{ route('citasReservadas.update',$id)}}" class="btn btn-success">Confirmar</a>
            </div>
        </div>
    </div>
</div>
@endif
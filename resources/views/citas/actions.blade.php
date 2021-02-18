<a class="btn btn-info" href="{{ route('citas.edit',$id) }}">
    <i class="fa fa-edit"></i>
</a>
<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminar_{{$id}}">
    <i class="fa fa-trash-alt"></i>
</a>
<div class="modal fade" id="eliminar_{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar médico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Esta seguro que desea eliminar esta cita?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <a href="{{ route('citas.delete',$id)}}" class="btn btn-success">Confirmar</a>
            </div>
        </div>
    </div>
</div>
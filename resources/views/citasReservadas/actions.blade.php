@if(Auth::user()->role_id==5)
<a class="btn btn-info" href="{{ route('citasReservada.edit',$id) }}">
    <i class="fa fa-edit"></i>
</a>
@endif
@foreach($organizations as $orgs)
<div class="modal fade" id="{{$orgs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content text-center">
            <!--Header-->
            <div class="modal-header d-flex justify-content-center bg-primary">
                <h5 class="heading text-sm-center text-light">Are you sure you want to delete ?</h5>
            </div>

            <!--Body-->
            <div class="modal-body">

                <i style="color:red;" class="fas fa-trash fa-4x animated rotateIn"></i>

            </div>

            <!--Footer-->
            <div class="modal-footer flex-center">
                <form method="POST" action="{{url('organization/' . $orgs->id)}}">
                    @csrf
                    {{method_field('delete')}}
                    <a type="button" class="btn" data-dismiss="modal">No</a>
                    <button type="submit" class="btn btn-danger waves-effect">Yes</button>
                </form>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
@endforeach

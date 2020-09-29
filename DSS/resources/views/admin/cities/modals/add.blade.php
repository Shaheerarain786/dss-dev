<div class="modal fade" id="addCity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content text-center">
            <!--Header-->
            <div class="modal-header d-flex justify-content-center bg-primary">
                <h5 style="color:white !important;" class="heading">Add City</h5>
            </div>

            <!--Body-->
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{url('cities')}}">
                    @csrf
                    @method("POST")
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-hor-inputemail">City
                                Name</label>
                            <div class="col-sm-9">
                                <input id="orgName" type="text" name="name" placeholder="City Name" class="form-control"
                                       value="">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </form>

            </div>

            <!--Footer-->
            <div class="modal-footer flex-center">
                <a type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

<div class="modal fade" id="assignBranchesView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content text-center">
            <!--Header-->
            <div class="modal-header d-flex justify-content-center bg-primary">
                <h5 style="color:white !important;" class="heading">City Vs Branches</h5>
            </div>

            <!--Body-->
            <div class="modal-body">
                <table id="branches" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="bg-primary">#</th>
                            <th class="bg-primary">City</th>
                            <th class="bg-primary">Branches</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($branches as $key => $branch)
                        <tr>
                            <td style="width: 40px">{{$key +  1}}</td>
                            <td>{{isset($branch->city->name) ? $branch->city->name : '' }}</td>
                            <td>{{$branch->branch_name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!--Footer-->
            <div class="modal-footer flex-center">
                <a type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

@extends('admin.layouts.master')
@section('pageTitle', 'Create Categories')
@section('breadcrumb')
    <li><a href="{{url('/')}}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{url('/')}}">Dashboard</a></li>
    <li><a href="{{url('branches')}}"> Branches</a></li>
    <li class="active">Create</li>
@endsection
@section('content')
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">Create Category</h3>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="panel-body">

                        <form class="form-horizontal" method="POST" action="{{url('branches')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="input-group mar-btm col-sm-12">
                                        <span style="background-color: #25476a; color: white" class="input-group-addon">Name</span>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-offset-0 col-sm-6">
                                <button class="btn btn-success" type="submit">Create</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{--    <script>--}}
    {{--        function onCategoryChange(id) {--}}

    {{--            var category_id = id.value;--}}
    {{--            $.ajax({--}}
    {{--                type:"GET",--}}
    {{--                url: '{{ route('get_sub_category') }}',--}}
    {{--                data: {id : category_id},--}}
    {{--                success:function (response) {--}}
    {{--                    $('#sub_category').html('<option value="">Select SubCategory</option>');--}}
    {{--                    response.forEach(element => {--}}
    {{--                        var newOption = new Option(element.name , element.id ,true);--}}
    {{--                    $('#sub_category').append(newOption).trigger('change')--}}
    {{--                })--}}
    {{--                }--}}
    {{--            });--}}
    {{--        }--}}

    {{--    </script>--}}
@endsection


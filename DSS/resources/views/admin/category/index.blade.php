@extends('admin.layouts.master')
@section('pageTitle', 'All Categories')
@section('breadcrumb')
    <li><a href="{{url('/')}}"><i class="demo-pli-home"></i></a></li>
    <li><a href="{{url('/')}}">Dashboard</a></li>
    <li class="active"><a href="{{url('category')}}">Categories</a></li>
@endsection

@section('content')
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">Manage Categories</h3>
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
                    @if(session()->has("success"))
                        <div class="alert alert-success">
                            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                            <stong>{{session()->get("success")}}</stong>
                        </div>
                    @endif
                    <div class="panel-body">
                        <a href="{{url('categories/create')}}" class="btn btn-primary">Add Categories</a>
                        <div class="panel">
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Branch Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($category as $key => $cat)
                                        <tr>
                                            <td style="width: 40px">{{$key +  1}}</td>
                                            <td>{{$cat->name}}</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm"
                                                   href="{{url('categories/'. $cat->id) . "/edit"}}"><i
                                                        class="fas fa-edit"></i></a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#{{$cat->id}}"><i
                                                        class="fas fa-times"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @foreach($category as $cat)
                        <div class="modal fade" id="{{$cat->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                                <!--Content-->
                                <div class="modal-content text-center">
                                    <!--Header-->
                                    <div class="modal-header d-flex justify-content-center">
                                        <h4 class="heading">Are you sure you want to delete</h4>
                                    </div>

                                    <!--Body-->
                                    <div class="modal-body">

                                        <i style="color:red;" class="fas fa-times fa-4x animated rotateIn"></i>

                                    </div>

                                    <!--Footer-->
                                    <div class="modal-footer flex-center">
                                        <form method="POST" action="{{url('categories/' . $cat->id)}}">
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
                </div>
            </div>
        </div>
    </div>
@endsection

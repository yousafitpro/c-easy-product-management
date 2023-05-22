@extends('UcEPM::layout')
@section('title',"Products")
@section('epm_content')
    <div class="page-header">
        <h4 class="page-title">Products</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{url('/')}}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Products</a>
            </li>

        </ul>
        <div class="btn-group btn-group-page-header ml-auto">
            <a href="{{route('uc_epm.add_product')}}"><button class="btn btn-primary btn-outline">Add New Product</button></a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Products
            </div>
        </div>
        <div class="card-body">

            <div class="col-12">
                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="dt-table" class="table table-sm table-bordered table-hover display  margin-top-10 w-p100">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Sale</th>
                                    <th>Status</th>

                                    <th>Actions</th>

                                </tr>

                                </thead>
                                <tbody>
                                @foreach(['id'=>'1','name'=>'product name','price'=>'1231','currency'=>'$','date'=>'12-12-2023'] as $item)
                                    <tr>
                                        <td>

                                        </td>
                                        <td style="text-align: center">
                                          My First Product

                                        </td>
                                        <td>
                                            122$
                                        </td>
                                        <td>
                                           12
                                        </td>
                                        <td>
                                            Active
                                        </td>

                                        <td>
                                            <div class="pull-right">
                                                <button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <div class="arrow"></div>
                                                    <a class="dropdown-item" href="{{route('merchant.offers.view',1)}}">View</a>
                                                   </div>
                                            </div>
                                        </td>
                                    </tr>
{{--                                    <div class="modal fade" id="refundpopup{{$item->id}}" tabindex="-1" role="dialog"--}}
{{--                                         aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                                        <div class="modal-dialog"  role="document">--}}
{{--                                            <div class="modal-content">--}}
{{--                                                <div class="modal-header">--}}
{{--                                                    <label>Refunding</label>--}}

{{--                                                    <button type="button" class="close" data-dismiss="modal"--}}
{{--                                                            aria-label="Close">--}}
{{--                                                        <span aria-hidden="true">&times;</span>--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <div class="modal-body">--}}




{{--                                                        <div class="box-body ">--}}
{{--                                                            <form action="{{route('merchant.offers.refund',$item->id)}}" method="post" >--}}
{{--                                                                @csrf--}}
{{--                                                                <div class="row">--}}
{{--                                                                    <div class="col-md-12">--}}
{{--                                                                        <label>Amount ( {{auth()->user()->company->currency}} )</label>--}}
{{--                                                                        <input class="form-control" name="amount" required>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <br>--}}
{{--                                                                <div class="row">--}}
{{--                                                                    <div class="col-md-12">--}}
{{--                                                                        <button class="form-control btn btn-primary" type="submit">Submit</button>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </form>--}}

{{--                                                        </div>--}}


{{--                                                        <br>--}}



{{--                                                    </div>--}}





{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}


{{--                                    </div>--}}

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('UcEPM::layout')
@section('title',"Products")
@section('epm_content')
    <div class="page-header">
        <h4 class="page-title">Add New Product</h4>
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
                <a href="{{route('uc_epm.index')}}">Products</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Add New Product</a>
            </li>
        </ul>
    </div>
    <form action="{{route('uc_epm.add_product')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">

            <div class="card-body">

                @include('errorBars.errorsArray')
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Product Name</label>
                            <input name="name" value="{{old('name')}}" class="form-control" id="name">
                        </div>
                        <div class="col-md-3">
                            <label>Purchase Price</label>
                            <input name="purchase_price" type="number" value="{{old('purchase_price')}}" class="form-control" id="purchase_price">
                        </div>
                        <div class="col-md-3">
                            <label>Sale Price </label>
                            <input name="sale_price"  value="{{old('sale_price')}}" class="form-control" id="sale_price" type="number" min="1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Thumbnail</label>
                            <input type="file"  class="form-control" name="thumbnail" id="main_image" >
                        </div>

                        <div class="col-md-4">
                            <label>Currency</label>
                            <select name="currency" id="currency" class="form-control">
                                <option {{old('currency')=='CAD'?'selected':''}} value="CAD">CAD</option>
                                <option {{old('currency')=='USD'?'selected':''}} value="USD">USD</option>
                                <option {{old('currency')=='EUR'?'selected':''}} value="EUR">EUR</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control">
                                <option {{old('status')=='Active'?'selected':''}} value="Active">Active</option>
                                <option {{old('status')=='Paused'?'selected':''}} value="Paused">Paused</option>

                            </select>
                        </div>
                    </div>
                    <br>
                    <br>
                    <label>Description</label>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea id="txtEditor2" name="product_details" class="form-control" style="text-align: center; height: 200px">{{old('product_details')}}</textarea>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-12" style="color:white">
                            <button type="submit" onclick="confirm('Please confirm transaction')"   class="btn form-control btn-primary" style="color:white">Add</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </form>
    <script>
        var invoice=null
        $("#file").change(function() {
            invoice = this.files[0];
            var fileType = invoice.type;
            var match = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'image/jpeg', 'image/png', 'image/jpg'];
            if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
                alert('Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.');
                $("#file").val('');
                invoice=null;
                return false;
            }
        });
        function sendOffer()
        {
            var transaction_details= $("#txtEditor2").val()
            var email= $("#email").val()
            var name= $("#name").val()
            var amount= $("#amount").val()
            var country_code= $("#country_code").val()
            var phone_number= $("#phone_number").val()
            if(!$("#agreementBox").prop("checked"))
            {
                swal({
                    title: "",
                    text: "Please read and tick the box below",
                })
                return;
            }
            //   if($("#agreementBox").val())
            if(transaction_details=="" || email=="" || name=="" || amount=="" || country_code=='' || phone_number=='' || invoice==null)
            {
                $.notify({
                    icon: 'flaticon-alarm-1',
                    title: 'Error',
                    message:"Please Fill all fields correctly",
                },{
                    type: 'danger',
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    time: 1000,
                });
                return;
            }
            swal({
                title: "Confirmation!",
                text: "Do you want to proceed?",
                icon: "success",
                buttons: ["No", "Yes"],
                dangerMode: true,
            })
                .then((res) => {
                    if (res) {
                        $("#mainLoader1").modal("show")
                        var form=new FormData()
                        form.append("transaction_details",transaction_details)
                        form.append("_token",'{{ csrf_token() }}')
                        form.append("email",email)
                        form.append("name",name)
                        form.append("invoice",invoice)
                        form.append("amount",amount)
                        form.append("country_code",country_code)
                        form.append("phone_number",phone_number)
                        form.append("currency",$("#currency").val())
                        $.ajax({
                            type: 'post',
                            url: "{{route('merchant.offers.create')}}",
                            data: form,
                            contentType: false,
                            cache: false,
                            processData:false,
                            success: function (data) {
                                $("#mainLoader1").modal("hide")
                                if(data.code=="1")
                                {
                                    $.notify({
                                        icon: 'flaticon-alarm-1',
                                        title: 'Success',
                                        message: data.message,
                                    },{
                                        type: 'success',
                                        placement: {
                                            from: "top",
                                            align: "right"
                                        },
                                        time: 1000,
                                    });
                                }
                                else{
                                    $.notify({
                                        icon: 'flaticon-alarm-1',
                                        title: 'Error',
                                        message: data.message,
                                    },{
                                        type: 'error',
                                        placement: {
                                            from: "top",
                                            align: "right"
                                        },
                                        time: 1000,
                                    });
                                }
                                setTimeout(function (){
                                    window.location.reload()
                                },1000)
//as
                            },
                            error:function (data)
                            {
                                $("#mainLoader1").modal("hide")
                                $.notify({
                                    icon: 'flaticon-alarm-1',
                                    title: 'Sorry!',
                                    message:"Request cannot be sent",
                                },{
                                    type: 'error',
                                    placement: {
                                        from: "top",
                                        align: "right"
                                    },
                                    time: 1000,
                                });
                                setTimeout(function (){
                                    // window.location.reload()
                                },1000)
                            }
                        })
                    } else {

                    }
                });


        }
        myTable = $('#myTable').DataTable()
    </script>

@endsection

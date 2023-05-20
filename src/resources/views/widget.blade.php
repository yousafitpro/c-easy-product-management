<div class="modal fade" id="uc_upload_file_modal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm"  role="document" style="border: solid 1px gray">
        <div class="modal-content">
            <div class="modal-header">
                <label>Upload File</label>

                <button type="button" class="close" onclick="close_upload_file_modal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <div class="modal-body">
<form method="POST" enctype="multipart/form-data" id="laravel-ajax-file-upload" action="javascript:void(0)">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <label>Name</label>
                <input required id="upload_file_name" class="form-control" name="upload_file_name" >
                <input  hidden id="user_id" value="{{$user_id}}" class="form-control" name="user_id" >
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">

                <input required id="upload_file_now" class="form-control" type="file" name="upload_file" >
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="form-control btn-primary" id="btn_gallery_upload">Uplaod</button>
            </div>
        </div>
    </div>
</form>





                </div>





            </div>
        </div>

    </div>


</div>
<?php

    if(isset($is_card))
    {

    }else
    {
        //adasdasd
        $is_card=true;
    }


    ?>
<div class=" {{$is_card?'card card-body':''}}">
    <div style="width: 100%">
        <div class="row">
            <div class="col-md-6">
                <input id="gallery_search_input" onkeyup="Gallery_Search()" class="form-control" placeholder="Search here">
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary " data-target="#uc_upload_file_modal" data-toggle="modal" style="float: right; width: 130px"> <i class="fas fa-file-upload"></i> Upload</button>

            </div>
        </div>
    </div>
    <br><br>

<div id="gallery_widget_sub_container">

</div>
</div>

<script>

    function close_upload_file_modal(){
        $("#uc_upload_file_modal").modal("hide")
    }
    function fun_upload_file()
    {
        var name=$("#upload_file_name").val();
        var file=$("#upload_file_now")[0].files[0]
        var form=new FormData()
        form.append('upload_file_name',name)
        form.append('upload_file',file)
        form.append('_token','{{ csrf_token() }}')


        {{--$.ajax({--}}
        {{--    url:"{{route('uc_gallery.upload_file')}}",--}}
        {{--    method:'post',--}}
        {{--    contentType: false,--}}
        {{--    processData: false,--}}
        {{--    data: form,--}}
        {{--    beforeSend:function(){--}}
        {{--        $(".products__btn").text("Loading...")--}}
        {{--    },--}}
        {{--    success:function(response){--}}
        {{--        load_gallery()--}}


        {{--    },--}}
        {{--    error: function (jqXHR, textStatus, errorThrown) {--}}


        {{--    },--}}
        {{--    complete:function(data){--}}

        {{--    }--}}
        {{--})--}}
    }
    var timevar=null
    function Gallery_Search() {
        if(timevar)
        {
            clearTimeout(timevar);
        }
        timevar=setTimeout(function (){
            load_gallery()
        },2000)

    }
    $(document).ready(function (){
        load_gallery()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#laravel-ajax-file-upload').submit(function(e) {
            $("#btn_gallery_upload").text("Uploading...")
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({

                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = (evt.loaded / evt.total) * 100;
                            $("#btn_gallery_upload").text(parseInt(percentComplete)+'%')
                        }
                    }, false);
                    return xhr;
                },
                type:'POST',
                url: "{{route('uc_gallery.upload_file')}}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    this.reset();

                    close_upload_file_modal()
                    load_gallery()

                    console.log(data);
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    })
    function search_from_gallery()
    {
        $("#gallery_widget_sub_container").empty();
        $("#gallery_widget_sub_container").append('<h3 style="text-align: center; color: gray">Loading</h3>');
        $.ajax({

            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;
                        $("")
                    }
                }, false);
                return xhr;
            },
            url:"{{route('uc_gallery.gallery_widget_search')}}",
            method:'get',
            data: {"_token": "{{ csrf_token() }}"},
            beforeSend:function(){
                $(".products__btn").text("Loading...")
            },
            success:function(response){
                $("#gallery_widget_sub_container").empty();
                $("#gallery_widget_sub_container").append(response);


            },
            error: function (jqXHR, textStatus, errorThrown) {


            },
            complete:function(data){

            }
        })
    }

    function load_gallery()
    {
        var input=$("#gallery_search_input").val()
        $("#gallery_widget_sub_container").empty();
        $("#gallery_widget_sub_container").append('<h3 style="text-align: center; color: gray">Loading</h3>');
        $.ajax({
            url:"{{route('uc_gallery.gallery_widget')}}?searchKeyword="+input+'&user_id={{$user_id}}',
            method:'get',
            data: {"_token": "{{ csrf_token() }}"},
            beforeSend:function(){
                $(".products__btn").text("Loading...")
            },
            success:function(response){
                $("#gallery_widget_sub_container").empty();
                $("#gallery_widget_sub_container").append(response);


            },
            error: function (jqXHR, textStatus, errorThrown) {


            },
            complete:function(data){

            }
        })
    }
    function copy_referer_id(id)
    {

        var copyText = document.getElementById(id);

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

        const clipboardItem = new ClipboardItem({
            'text/plain': someAsyncMethod().then((result) => {

                /**
                 * We have to return an empty string to the clipboard if something bad happens, otherwise the
                 * return type for the ClipBoardItem is incorrect.
                 */
                if (!result) {
                    return new Promise(async (resolve) => {
                        resolve(new Blob[``]())
                    })
                }

                const copyText = `some string`
                return new Promise(async (resolve) => {
                    resolve(new Blob([copyText]))
                })
            }),
        })
// Now, we can write to the clipboard in Safari
        navigator.clipboard.write([clipboardItem])
    }
</script>


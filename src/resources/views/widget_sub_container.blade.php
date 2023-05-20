<div class="row">
    @if(count($list)>0)
    @foreach($list as $item)
        <div class="col-md-3">
            <div class="card">

                <div class="card-body" style="padding: 2px">
                    <input hidden id="coppy_link{{$item->id}}" value="{{url($src.'/'.$item->store_by_name)}}">

                    <div style="position:relative; height: 150px" >

                        <div style="position: absolute; width: 100%;">
                           @if($item->extension=='png')
                                <img style="height: 150px; width: 100%" src="{{url($src.'/'.$item->store_by_name)}}">
                                @elseif($item->extension=='jpg')
                                <img style="height: 150px; width: 100%" src="{{url($src.'/'.$item->store_by_name)}}">
                                @elseif($item->extension=='jpeg')
                                <img style="height: 150px; width: 100%" src="{{url($src.'/'.$item->store_by_name)}}">
                            @else
                                <img style="height: 150px; width: 100%" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAIACAMAAADDpiTIAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MTJGODNFNjEyMkI4MTFFMzg5OTZBMTVDODc2MEQzRUEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MTJGODNFNjIyMkI4MTFFMzg5OTZBMTVDODc2MEQzRUEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpFQzQ3NkYwQzIyQjcxMUUzODk5NkExNUM4NzYwRDNFQSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoxMkY4M0U2MDIyQjgxMUUzODk5NkExNUM4NzYwRDNFQSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pnp8zNcAAAHUUExURTV3q0eNw02V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">
                            @endif
                        </div>
                        <div style="position: absolute; bottom: 0px; background-color: white;width: 100%;">
                            <h3 style="color: gray; margin-left: 10px; margin-right: 10px">{{$item->name}}</h3>
                        </div>
                        <div style="position: absolute; right: 0; top: 0">
                            <div style="width: 100%;padding: 10px"  >
                                <i class="fa fa-ellipsis-h" style="zoom: 1.3; border: solid 1px gray; outline: solid 1px white; border-radius: 6px; padding-left: 8px;padding-right: 8px; padding-top: 2px;padding-bottom: 2px"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>

                                <div class="dropdown-menu">
                                    <div class="arrow"></div>
                                    <a class="dropdown-item" href="#" onclick="copy_referer_id('coppy_link{{$item->id}}')">
                                        <i class="fa fa-copy" ></i>
                                        Copy Link</a>
                                    <a class="dropdown-item" href="{{url($src).'/'.$item->store_by_name}}" download>
                                        <i class="fa fa-download" ></i>
                                        Download</a>
                                    <a class="dropdown-item" href="#" onclick="delete_file('{{app_encrypt($item->id)}}')" >
                                        <i class="fa fa-trash" ></i>
                                        Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    @else
        <br>
        <br>
        <div style="width: 100%;">
            <h3 style="text-align: center">No Records Found</h3>
        </div>
        @endif
</div>
<script>
    function delete_file(id)
    {

        if(confirm('Are you sure'))
        {
            $.ajax({
                url:"{{url('Gallery/gallery-delete-file')}}/"+id,
                method:'get',
                data: {"_token": "{{ csrf_token() }}"},
                beforeSend:function(){
                },
                success:function(response){
                    $("#uc_gallery_modal").modal('hide')
                    load_gallery()
                },
                error: function (jqXHR, textStatus, errorThrown) {


                },
                complete:function(data){

                }
            })
        }
    }
</script>

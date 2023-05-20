<?php

namespace Yousafitpro\PhotoLibrary\Controllers;
use Yousafitpro\PhotoLibrary\models\ucGalleryFile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class UcPhotoLibraryController extends Controller
{
  //asdasdasdasdasasdasd
  public $SRC = 'my_gallary';
  public function index(Request $request)
  {
//adasdasdadad
      return view('UcPhotoLib::index');
  }
  public function gallery_widget(Request $request)
  {
    //asdasd
      $SRC = 'my_gallary';
      $data['list']=ucGalleryFile::where('user_id',$request->user_id)->where(['deleted_at'=>null]);
        if($request->has('searchKeyword'))
        {
          $data['list']=$data['list']->where('name', 'like', '%' . request('searchKeyword') . '%');
        }
      $data['list']=$data['list']->latest()->get();
      $data['src']='public/'.$SRC;
      return view('UcPhotoLib::widget_sub_container',$data);
  }
  public function upload_file(Request $request)
  {
      $img = $request->upload_file;
      if ($img) {
          $data['file_given_name']='';
          $file = request()->file('upload_file');



                $data['file_given_name'] = saveImageAjax($file, $this->SRC.'/');

                $data['file_extension'] = $img->getClientOriginalExtension();
                $data['file_original_name'] = $img->getClientOriginalName();
                $file=new ucGalleryFile();
                $file->name=$request->upload_file_name;
                $file->user_id=$request->user_id;
                $file->store_by_name=$data['file_given_name'];
                $file->original_name=$data['file_original_name'];
                $file->extension=$data['file_extension'];

//            $file->size=$img->getSize();
                $file->save();

      }
      if (Request::capture()->expectsJson())
      {
          return response()->json([
              'code'=>'1',
              'message'=>"File Uploaded Successfully"
          ]);
      }
      return redirect()->back()
          ->with([
              'toast' => [
                  'heading' => 'Message',
                  'message' => "Uploaded Successfully",
                  'type' => 'success',
              ]
          ]);
  }
  public function gallery_delete_file(Request $request,$id){
       $file=ucGalleryFile::find(app_decrypt($id));
      File::delete(public_path($this->SRC.'/'.$file->store_by_name));
      $file->delete();
      if (Request::capture()->expectsJson())
      {
          return response()->json([
              'code'=>'1',
              'message'=>"File Deleted Successfully"
          ]);
      }
  }
}

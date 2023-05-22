<?php

namespace Yousafitpro\EPM\Controllers;
use Yousafitpro\EPM\models\epmProducts;
use Yousafitpro\PhotoLibrary\models\ucGalleryFile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class EPMServiceController extends Controller
{
    public $SRC='product/images/';

    public function index()
    {
        return view('UcEPM::index');
    }
    public function add_product()
    {
        return view('UcEPM::product.add');
    }
    public function create_product(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'purchase_price'=>'required|integer',
            'sale_price'=>'required|integer|min:'.$request->purchase_price,
            'product_details'=>'required',
            'currency'=>'required',
        ]);





        $img = $request->thumbnail;
        if ($img) {

            $data['file_given_name']='';
            $file = request()->file('thumbnail');
            $data['file_given_name'] = emp_save_image($file, $this->SRC.'/');
            $data['file_extension'] = $img->getClientOriginalExtension();
            $data['file_original_name'] = $img->getClientOriginalName();
            $formData=$request->except(['_token']);
            $formData['thumbnail']=$this->src.$data['file_given_name'];
            $p=epmProducts::create($formData);
            $p->user_id=auth()->user()->id;
            $p->save();





        }
    }

}

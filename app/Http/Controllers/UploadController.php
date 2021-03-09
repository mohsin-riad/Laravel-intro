<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageModel;
use Image;
class UploadController extends Controller
{
    public function upload(){
        $img = ImageModel::all();

        return view('upload.pages.upload', compact('img'));
    }
    public function uploadImage(Request $request){
        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image'
        ]);
        $i = 1;
        foreach($request->file('filename') as $file)
        {
            $originalImage= $file;
            $thumbnailImage = Image::make($originalImage);

            $thumbnailPath = public_path().'/thumbnail/';
            $originalPath = public_path().'/images/';
            
            $filename = $originalImage->getClientOriginalName();
            $ext = explode(".", $filename);
            $ext = end($ext);
            $filename = time().rand(1,100).$i.'.'.$ext;

            $thumbnailImage->save($originalPath.$filename);
            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.$filename); 

            $imagemodel= new ImageModel();
            $imagemodel->filename = $filename;
            $imagemodel->save();
            $i++;
        }
        return redirect()->back();
    }
}

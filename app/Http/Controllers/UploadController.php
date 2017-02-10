<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Storage;

use App\ExternalClass\UploadHandler;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $files=Storage::disk('uploads')->files('/');
        $r['files'] = array_values(array_sort($files, function ($value) {
            return $value;
        }));
        return view('admin.uploads.index', $r);
    }

    public function upload(){
        $upload_handler = new UploadHandler();
    }

    public function mostra($file){
        $path=storage_path().'/app/uploads/';
        return response()->file($path.$file);
    }

    public function elimina($file){
        $r['file']=$file;
        return view('admin.uploads.elimina', $r);
    }

    public function distruggi($file){
        Storage::disk('uploads')->delete($file);
        return redirect()->route('RUpload')->with('info', ora().'File cancellato');
    }
}

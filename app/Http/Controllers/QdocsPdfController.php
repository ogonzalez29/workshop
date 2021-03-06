<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\QdocsPdfRepository;
use App\Qdocs;

class QdocsPdfController extends Controller
{
        use QdocsPdfRepository;
    
        public function __construct()
        {
                $this->middleware('auth');
        }

        public function getQdocsPdf ($id)
        {
                $qdoc = Qdocs::find($id);
                $date = date('dmY', strtotime($qdoc->created_at));
                $doc = $qdoc->doc_number + 1115;
                $filename = $doc.'_'.$qdoc->license.'_'.$date.'.pdf';
                $path = storage_path('app/'.$filename);
                //Save file to storage folder
                $this->printQdocsPdf($id)->save($path, true);

                //Download file saved in storage
                return \Response::download($path);
        }

}

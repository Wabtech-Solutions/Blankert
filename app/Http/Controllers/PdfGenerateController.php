<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use PDF;



class PdfGenerateController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request)
    {
        $users = DB::table("users")->get();
        view()->share('users',$users);

        if($request->has('download')) {
        	// pass view file
            $pdf = PDF::loadView('pdf');
            $pdf->setOption('enable-javascript', true);
            $pdf->setOption('javascript-delay', 1);
            $pdf->setOption('enable-smart-shrinking', false);
            $pdf->setOption('no-stop-slow-scripts', true);
            $pdf->setOption('margin-top', '0');
            $pdf->setOption('margin-bottom', '0');
            $pdf->setOption('margin-left', '0');
            $pdf->setOption('margin-right', '0');
            $pdf->setOption('page-height', '297mm');
            $pdf->setOption('page-width', '210mm');
            $pdf->setOption('lowquality', true);
            $pdf->setOption('disable-smart-shrinking', true);
            $pdf->setOption('zoom', '1.0');
            // download pdf

            return $pdf->download('offerte.pdf');
        }

        return view('pdf');
}
}

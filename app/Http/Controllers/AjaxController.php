<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;

session_start();
class AjaxController extends Controller
{
    public function getquanhuyen($idThanhPho)
    {

        $quanhuyen = DB::table('tbl_quanhuyen')
                        ->where('matp',$idThanhPho)
                        ->orderby('name','asc')
                        ->get();
        foreach ($quanhuyen as $qh) {
             echo"<option value='".$qh->maqh."'>".$qh->name."</option>";
         } 
    }

        public function getphuongxa($idQuanHuyen){

        $phuongxa = DB::table('tbl_xaphuongthitran')
                        ->where('maqh',$idQuanHuyen)
                        ->orderby('maxa','asc')
                        ->get();
        foreach ($phuongxa as $px) {
             echo"<option value='".$px->maxa."'>".$px->name."</option>";
         } 
    }
    public function getnamecate($slug)
    {
        $namecate = DB::table('tbl_category_product')
                        ->where('slug_category_product',$slug)
                        ->orderby('category_name','asc')
                        ->get();
        foreach ($namecate as $cate) {
             echo"<option value='".$cate->category_id."'>".$cate->category_name."</option>";
         } 
    }
    
}

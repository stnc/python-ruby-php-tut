<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Products;
use App\Model\ProductsBgg;
use App\Model\ProductsFa;
use Illuminate\Support\Facades\Input;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



        //$request->user()->authorizeRoles(['employee', 'manager']);
        return view('home');
    }


    public function admin()
    {
        return view('admin');
    }


    public function getPosts()
    {

        $eleman = Products::query();

        if (Input::get('tek') == "2") {
            $dukkan = Input::get('tek');
            $eleman = Products::whereNull('amazon_url');
        } else if (Input::get('tek') == "1") {
            $eleman = Products::  whereNotNull('amazon_url' );
        }

        return \DataTables::of($eleman)
            ->addColumn('action', function ($user) {
              //  $a = '<a href="/urunler/' . $user->urun_id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-shopping-cart"></i> GÖster</a>';
//https://www.amazon.com/s/ref=nb_sb_noss?url=search-alias%3Daps&field-keywords=7%20WONDERS%20-%20CITIES
          //      $a = '<a href="https://urun.n11.com/arnascrm/arans_urun-P' . $user->n11_id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-star"></i> n11 sayfası</a>';
                $a = '<a href="/urunler_amazon/' . $user->id . '/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-remove"></i> Düzenle</a>';
                $a .= '<a href="edit-' . $user->id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i> Sil</a>';
                return $a;


            })
//            ->editColumn('n11_id', 'N11 ID: {{$n11_id}}')
            ->make(true);
    }


    public function getBBProduct()
    {

        $eleman = ProductsBgg::query();

        if (Input::get('tek') == "2") {
            $dukkan = Input::get('tek');
            $eleman = ProductsBgg::whereNull('boardgamegeek_url');
        } else if (Input::get('tek') == "1") {
            $eleman = ProductsBgg::  whereNotNull('boardgamegeek_url' );
        }

        return \DataTables::of($eleman)
            ->addColumn('action', function ($user) {
                $a = '<a href="/urunler_bgg/' . $user->id . '/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-remove"></i> Düzenle</a>';
                $a .= '<a href="edit-' . $user->id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i> Sil</a>';
                return $a;


            })


            ->make(true);
    }


    public function getFAProduct()
    {

        $eleman = ProductsFa::query();

        if (Input::get('tek') == "2") {
            $dukkan = Input::get('tek');
            $eleman = ProductsFa::whereNull('funagain_url');
        } else if (Input::get('tek') == "1") {
            $eleman = ProductsFa::  whereNotNull('funagain_url' );
        }

        return \DataTables::of($eleman)
            ->addColumn('action', function ($user) {
                $a = '<a href="/urunler_funagain/' . $user->id . '/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-remove"></i> Düzenle</a>';
                $a .= '<a href="edit-' . $user->id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i> Sil</a>';
                return $a;


            })


            ->make(true);
    }

}

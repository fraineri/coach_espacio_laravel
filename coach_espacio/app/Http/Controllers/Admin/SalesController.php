<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sale;
use App\Salesdetail;
use App\Product;

class SalesController extends Controller
{
    //delueve una variable con las ventas entregadas y otra con las ventas pendientes
    public function index ()
    {
    	$delivered=DB::table('sales')->join('saledetails','sales.id','=','saledetails.sale_id')->join('products','saledetails.product_id','=','products.id')->where('sales.delivered',true)->select('sales.name','sales.surname','sales.address','sales.city','sales.province','sales.cp','sales.phone','sales.total','sales.delivered','products.id','products.name','saledetails.price_unit','saledetails.qty')->get();

    	$pending=DB::table('sales')->join('saledetails','sales.id','=','saledetails.sale_id')->join('products','saledetails.product_id','=','products.id')->where('sales.delivered',false)->select('sales.name','sales.surname','sales.address','sales.city','sales.province','sales.cp','sales.phone','sales.total','sales.delivered','products.id','products.name','saledetails.price_unit','saledetails.qty')->get();
    	return view('admin.sales.index-sales', compact('delivered','pending'));
    }

    public function edit($id)
    {
        $sale = Sale::find($id);
        return view('admin.sales.fordeliver', compact('sale'));
    }

    //recibe una venta pendiente y la cambia a entregada
    public function delivered(Request $request, $id)
    {

    }
}

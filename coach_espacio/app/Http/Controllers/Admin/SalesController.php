<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Sale;
use App\Saledetail;
use App\Product;

class SalesController extends Controller
{
    //delueve una variable con las ventas entregadas y otra con las ventas pendientes
    public function index()
    {
    
    	$delivered=Sale::where('delivered', true)->get();
    	$pending=Sale::where('delivered', false)->where('status', 'finished')->get();
    	return view('admin/sales/index-sales', compact('pending', 'delivered'));
    }

    public function show($id)
    {
        $sale = Sale::find($id);
        $items= Saledetail::where('sale_id',$id)->get();
        return view('admin.sales.sale', compact('sale','items'));
    }

    public function edit($id){
        $sale = Sale::find($id);
        $items= Saledetail::where('sale_id',$id)->get();
        return view('admin/sales/fordeliver', compact('sale','items'));
    }

    //recibe una venta pendiente y la cambia a entregada
    public function delivered(Request $request, $id)
    {
    	 $sale = Sale::find($id);
    	 $sale->delivered= $request->delivered;
    	 $sale->save();
    	 return redirect('/admin/sales/');
    }
}

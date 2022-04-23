<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidosRapidosStoreRequest;
use App\Http\Requests\PedidosRapidosUpdateRequest;
use App\PedidosRapido;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Invoice;
use Alert;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\ProductCategory;

class PedidosRapidosController extends Controller
{

    public function index(Request $request)
    {
        return view('pedidosRapido.index');
    }

    public function create(Request $request)
    {
        $products = Product::all()->where('status', '=', 1);
        return view('pedidosRapido.create', compact('products'));
    }

    public function store(Request $request)
    {

        try {
            $request['products'] = json_decode($request['products']);

            $order = [
                'user_id' => (int) $request['user_id'],
                'box_id' => (int) $request['box_id'],
                'order_types_id' => 2,
                'total' => (double) $request['total_order'],
                'status' => 1
            ];

            // $this -> validate($order, $validate, $this->messageProduct());
            $order_id = Order::create($order)->id;

            foreach ($request['products'] as $p){
                $product = [
                    'order_id' => (int) $order_id,
                    'product_id' => (int) $p->id,
                    'quantity' => (int) $p->quantity,
                    'price' => (double) $p->price,
                    'discount' => 0,
                    'total' => (double) (($p->quantity)*($p->price)),
                    'description' => "Nota",
                    'created_at' => Carbon::now()
                ];
                OrderProduct::insert($product);
            }
            $invoice = [
                'token' => 'inv'.$order_id,
                'rnc' => 'RNC'.$order_id,
                'order_id' => $order_id,
                'payment_method_id' => 1,
                'shipping' => 0,
                'promo' => 0,
                'taxes' => 0,
                'discount' => 0,
                'total' => (double) $request['total_order'],
                'status' => 1,
                'created_at'  => Carbon::now()
            ];
            Invoice::insert($invoice);

            Alert::toast('Orden realizada correctamente', 'success');
            return redirect('order_screen/create/');
            
        }catch (Exception $e){
            Alert::toast('Error al realizar la orden', 'danger');
            throw new Exception($e);

        }
    }

    public function show(Request $request, PedidosRapido $pedidosRapido)
    {
        return view('pedidosRapido.show', compact('pedidosRapido'));
    }

    public function edit(Request $request, PedidosRapido $pedidosRapido)
    {
        return view('pedidosRapido.edit', compact('pedidosRapido'));
    }

    public function update(PedidosRapidosUpdateRequest $request, PedidosRapido $pedidosRapido)
    {
        $pedidosRapido->update($request->validated());

        $request->session()->flash('pedidosRapido.id', $pedidosRapido->id);

        return redirect()->route('pedidosRapido.index');
    }

    public function destroy(Request $request, PedidosRapido $pedidosRapido)
    {
        $pedidosRapido->delete();

        return redirect()->route('pedidosRapido.index');
    }

}

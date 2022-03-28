<?php

namespace App\Http\Controllers;

use App\Caja;
use App\Http\Requests\CajaStoreRequest;
use App\Http\Requests\CajaUpdateRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Table;
use App\Models\LivingRoom;
class CajaController extends Controller
{

    public function messageProduct(){
        return [
            'user_id.required' => 'El id del usuario es requerido.',
            'user_id.int' => 'El id debe ser un numero.',

            'box_id.required' => 'El id de la caja es requerido.',
            'box_id.int' => 'El id debe ser un numero.',

            'customer_id.required' => 'El id del cliente es requerido.',
            'customer_id.int' => 'El id debe ser un numero.',

            'order_types_id.required' => 'El id del tipo de orden es requerido.',
            'order_types_id.int' => 'El id debe ser un numero.',

            'table_id.required' => 'El id de la mesa es requerido.',
            'table_id.int' => 'El id debe ser un numero.',

            'total.required' => 'El total es requerido.',
            'total.required' => 'El total debe ser un con punto decimal.'
        ];
    }

    public function index()
    {
        return view('caja.index');
    }

    public function create(Request $request)
    {
        $productCategories = ProductCategory::all()->where('status', '=', 1);
        $products = Product::all()->where('status', '=', 1);
        $tables = Table::all()->where('status', '<>', 0);
        $livingRooms = LivingRoom::all()->where('status', '=', 1);
        return view('caja.create', compact('productCategories', 'products', 'tables', 'livingRooms'));
    }

    public function store(Request $request)
    {

        try {

            $request['products'] = json_decode($request['products']);
            $order = [
                'user_id' => (int) $request['user_id'],
                'box_id' => (int) $request['box_id'],
                'customer_id' => (int) $request['customer_id'],
                'orders_types_id' => 1,
                'table_id' => (int) $request['table_id'],
                'total' => (double) $request['total_order'],
                'status' => 1
            ];

            $order = Order::insert($order);
            return $order->id;

            foreach ($request['products'] as $p){
                $product = [
                    'order_id' => (int) $order_id,
                    'product_id' => (int) $p->id,
                    'quantity' => (int) $p->qty,
                    'price' => (double) $p->price,
                    'discount' => 0,
                    'total' => (double) $p->total
                ];
                return $p->name;
                return response()->json($p);
            }

            return response()->json($order);
            // dd(response()->json($order), $data, $data['products']);

            $validate = [
                'user_id' => 'required|int',
                'box_id' => 'required|int',
                'customer_id' => 'required|int',
                'order_types_id' => 'required|int',
                'table_id' => 'required|int',
                'total' => 'required|double',
                'status' => 'boolean',
            ];

            $this -> validate($request, $validate, $this->messageProduct());

            // ($request['status'] == 'on') ? $request['status'] = true : $request['status'] = false;

            $jsonOrders = [
                'user_id' => (int) $request['user_id'],
                'box_id' => (int) $request['box_id'],
                'customer_id' => (int) $request['customer_id'],
                'order_types_id' => (int) $request['order_types_id'],
                'table_id' => (int) $request['order_types_id'],
                'total' => (double) $request['total'],
                'status' => $request['status'],
            ];

            $order = Order::insert($jsonOrders);

            // TODO: ESTE JSON SE VA A BORRAR PORQUE SE VA A INSERTAR EL ARRAY CON LOS DATOS DEL DETALLE DIRECTAMENTE
            $products = [];

            foreach ($products as $product){
                // OrderProduct::create($product);
            }

            redirect('caja');

        }catch (Exception $e){

            throw new Exception($e);

        }

    }

    public function show(Request $request, Caja $caja)
    {
        return view('caja.show', compact('caja'));
    }

    public function edit(Request $request, Caja $caja)
    {
        return view('caja.edit', compact('caja'));
    }

    public function update(Request $request, $id)
    {

        $validate = [
            'user_id' => 'required|int',
            'box_id' => 'required|int',
            'customer_id' => 'required|int',
            'order_types_id' => 'required|int',
            'table_id' => 'required|int',
            'total' => 'required|double',
            'status' => 'boolean',
        ];

        $this -> validate($request, $validate, $this->messageProduct());

        (isset($request['status'])) ? $request['status'] = 1 : $request['status'] = 0;

        $order = $request->except(['_token', '_method']);

        $jsonOrders = [
            'user_id' => (int) $order['user_id'],
            'box_id' => (int) $order['box_id'],
            'customer_id' => (int) $order['customer_id'],
            'order_types_id' => (int) $order['order_types_id'],
            'table_id' => (int) $order['order_types_id'],
            'total' => (double) $order['total'],
            'status' => $order['status'],
        ];

        Order::where('id','=',$id)->update($jsonOrders);

        // TODO: AGREGAR EL ACTUALIZAR DE DETALLE DE ORDEN
        $products = [];

        foreach ($products as $product){
            OrderProduct::where('id','=',$id)->update($products);
        }

        return redirect('caja');

    }

    public function destroy($id)
    {
        try{
            $order = Order::findOrFail($id);
            $order->delete();
            return redirect('caja');
        }catch(Exception $e){
            throw new Exception($e);
        }
    }

}

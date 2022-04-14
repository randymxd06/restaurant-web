<?php

namespace App\Http\Controllers;

use Auth;
use App\Caja;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\throwException;
use App\Http\Requests\CajaStoreRequest;
use App\Http\Requests\CajaUpdateRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Table;
use App\Models\LivingRoom;
use App\Models\Entity;
use App\Models\Customer;
use App\Models\Box;
use Carbon\Carbon;
use Alert;

class CajaController extends Controller
{

    public function messageProduct(){
        return [
            'user_id.required' => 'El el usuario es requerido.',
            'user_id.int' => 'El id del usuario deber ser numerico-int.',

            'box_id.required' => 'La caja es requerida.',
            'box_id.int' => 'El id de la caja deber ser numerico-int.',

            'customer_id.required' => 'El cliente es requerido',
            'customer_id.int' => 'El id del cliente dene ser numerico-int',

            'order_types_id.required' => 'El id del tipo de orden es requerido.',
            'order_types_id.int' => 'El id del tipo de orden debe ser numerico-int.',

            'table_id.required' => 'La mesa es requerida.',
            'table_id.int' => 'El id de la mesa debe ser numerico-int.',

            'total_order.required' => 'El total es requerido.',
            'total_order.required' => 'El total debe ser un con punto decimal.',
            'products.required' => 'No hay productos seleccionados'
        ];
    }

    public function index()
    {
        return view('caja.index');
    }

    public function create(Request $request)
    {
        $currentuserid = Auth::user()->id;

        $box = Box::where('user_id', '=', $currentuserid)->first();
        if ($box === null) {
        //    El usuario registrado no tiene una caja
            return redirect('dashboard')->with('error-box','ok');
        }

        $productCategories = ProductCategory::all()->where('status', '=', 1);
        $products = Product::all()->where('status', '=', 1);
        $tables = Table::all()->where('status', '<>', 0);
        $livingRooms = LivingRoom::all()->where('status', '=', 1);
        $customers = Customer::all();
        $entities = Entity::all();

        return view('caja.create', compact('productCategories', 'products', 'tables', 'livingRooms', 'customers', 'entities', 'box'));
    }

    public function store(Request $request)
    {

        try {
            $validate = [
                'user_id' => 'required|int',
                'box_id' => 'required|int',
                'customer_id' => 'required|int',
                'table_id' => 'required|int',
                'total_order' => 'required|numeric',
                'products' => 'required'
            ];
            $this -> validate($request, $validate, $this->messageProduct());

            $request['products'] = json_decode($request['products']);

            $order = [
                'user_id' => (int) $request['user_id'],
                'box_id' => (int) $request['box_id'],
                'customer_id' => (int) $request['customer_id'],
                'order_types_id' => 1,
                'table_id' => (int) $request['table_id'],
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

            Alert::toast('Orden realizada correctamente', 'success');
            return redirect('caja/edit/'.$order_id);
            
        }catch (Exception $e){
            Alert::toast('Error al realizar la orden', 'danger');
            throw new Exception($e);

        }

    }

    public function show(Request $request, Caja $caja)
    {
        return view('caja.show', compact('caja'));
    }

    public function edit($id)
    {
        // Obtener datos de la orden
        $order = DB::table('orders')
            ->select('orders.id as id', 'orders.customer_id', 'orders.customer_id','entities.first_name as c_first_name', 'entities.last_name as c_last_name', 'tables.id as table_id' )
            ->join('tables', 'orders.table_id', '=', 'tables.id')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->join('entities', 'customers.entity_id', '=', 'entities.id')
            ->where('orders.id', '=', $id)
            ->first();
        $orderProducts = DB::table('order_products')
        ->join('products', 'products.id', '=', 'order_products.product_id')
        ->where('order_products.order_id', '=', $id)
        ->get(['order_products.*', 'products.id', 'products.name', 'products.price', 'products.image', 'products.products_categories_id']);
        
        
        $currentuserid = Auth::user()->id;
        $box = Box::where('user_id', '=', $currentuserid)->first();
        if ($box === null) {
        //    El usuario registrado no tiene una caja
            return redirect('dashboard')->with('error-box','ok');
        }

        $productCategories = ProductCategory::all()->where('status', '=', 1);
        $products = Product::all()->where('status', '=', 1);
        $tables = Table::all()->where('status', '<>', 0);
        $livingRooms = LivingRoom::all()->where('status', '=', 1);
        $customers = Customer::all();
        $entities = Entity::all();

        return view('caja.edit', compact('order', 'orderProducts', 'productCategories', 'products', 'tables', 'livingRooms', 'customers', 'entities', 'box'));
    }

    public function update(Request $request, $id)
    {

        $validate = [
            'user_id' => 'required|int',
            'box_id' => 'required|int',
            'customer_id' => 'required|int',
            'table_id' => 'required|int',
            'total_order' => 'required|numeric',
            'products' => 'required'
        ];

        $this -> validate($request, $validate, $this->messageProduct());

        $request['products'] = json_decode($request['products']);

        $order = $request->except(['_token', '_method']);

        $order = [
            'user_id' => (int) $request['user_id'],
            'box_id' => (int) $request['box_id'],
            'customer_id' => (int) $request['customer_id'],
            'order_types_id' => 1,
            'table_id' => (int) $request['table_id'],
            'total' => (double) $request['total_order'],
            'status' => 1
        ];

        Order::where('id','=',$id)->update($order);

        foreach ($request['products'] as $p){
            $product = [
                'quantity' => (int) $p->quantity,
                'price' => (double) $p->price,
                'discount' => 0,
                'total' => (double) (($p->quantity)*($p->price)),
                'description' => "Nota",
                'updated_at' => Carbon::now()
            ];
            OrderProduct::where([
                ['order_id', '=',$id],
                ['product_id', '=', $p->id]
            ])->update($product);
        }
        Alert::toast('La orden #'.$id.' a sido modificada correctamente!', 'success');
        return redirect('caja/edit/'.$id);
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

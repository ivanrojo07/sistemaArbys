<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Cliente;
use App\Product;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Tipo;
use App\Categoria;
use App\CategoriaCarro;
use App\CategoriaMoto;
use App\Services\Mail\SendMailService;

class ClienteProductoController extends Controller
{
    public function __construct(SendMailService $sendMailService)
    {
        $this->sendMailService = $sendMailService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente, Request $request)
    {

        dd('no');

        $min = $request->min;
        $max = $request->max;
        $desc = $request->kword;
        $tipo = $request->type;
        $productos = new Product();

        $categoria = CategoriaCarro::find($request->input('categoria'));
        if ($categoria) {
            $productos = $productos->categoria($categoria->nombre);
        }

        $tipo_moto = CategoriaMoto::find($request->input('tipo_moto_id'));
        if ($tipo_moto) {
            $productos = $productos->categoria($tipo_moto->nombre);
        }

        /* Obtenemos el tipo de empleado del usuario autenticado para el caso de que sea vendedor 
         * solo se muestren los vehiculos en los que es experto.
         */
        $tipo_empleado = Auth::user()->empleado->laborales->last()->puesto->nombre;

        if (isset($desc)) {
            $wordsquery = explode(' ', $desc);
            $productos = $productos->where(function ($q) use ($wordsquery) {
                foreach ($wordsquery as $word) {
                    $q->orWhere('clave', 'LIKE', "%$word%")
                        ->orWhere('marca', 'LIKE', "%$word%")
                        ->orWhere('descripcion', 'LIKE', "%$word%")
                        ->orWhere('apertura', 'LIKE', "%$word%");
                    //->orWhere('precio_lista', 'LIKE', "%$word%")
                }
            }); //->whereMonth('created_at', date("m"));  Se usuara cuando se pida los registros por mes
        }
        if (isset(Auth::user()->empleado->vendedor))
            $experto = Auth::user()->empleado->vendedor->experto;
        else
            $experto = Auth::user()->empleado->experto;
        if ($tipo_empleado === "Vendedor") {
            switch ($experto) {
                case 'Autos':
                    $productos = $productos->where('tipo', 'CARRO')->orWhere('tipo', 'MOTO');;
                    break;

                case 'Motos':
                    $productos = $productos->where('tipo', 'MOTO')->orWhere('tipo', 'MOTO');;
                    break;

                default:
                    $productos = $productos->where('tipo', 'CARRO')->orWhere('tipo', 'MOTO');
                    break;
            }
        } else {
            if (isset($tipo))
                $productos = $productos->where('tipo', $tipo); //->whereMonth('created_at', date("m"));  Se usuara cuando se pida los registros por mes
        }

        if (isset($min) && isset($max))
            $productos = $productos->whereBetween('precio_lista', [intval($min), intval($max)]);

        if (isset($min) && !isset($max))
            $productos = $productos->whereBetween('precio_lista', [intval($min), 10000000]);

        if (!isset($min) && isset($max))
            $productos = $productos->whereBetween('precio_lista', [0, intval($max)]);

        if ($tipo == 'MOTO' && isset($request->cilindrada_minima)) {

            $productos = Product::where('tipo','MOTO');

            // Obtenemos cilindrada minima en entero
            $cilindrada_minima = $request->cilindrada_minima;
            $cilindrada_minima = (int) preg_replace("/[^0-9]/", "", $cilindrada_minima);

            // Obtenemos cilindrada maxima en entero
            $cilindrada_maxima = $request->cilindrada_maxima;
            $cilindrada_maxima = (int) preg_replace("/[^0-9]/", "", $cilindrada_maxima);

            $productos = $productos->whereBetween('cilindrada', [$cilindrada_minima, $cilindrada_maxima])->orderBy('cilindrada', 'DESC');
        }
        if ($tipo == 'MOTO' && isset($request->categoria)) {

            $productos = $productos->where('categoria','like', '%'.strtoupper($request->categoria).'%');
        }

        $tipos = Tipo::get();
        $categorias = Categoria::get();
        $categoriasCarros = CategoriaCarro::get();
        $categoriasMotos = CategoriaMoto::get();

        $productos = $productos->where('mostrar', 1);
        
        $productos = $productos->sortable()->paginate(10)->appends($request->all());
        return view('productos.index', ['cliente' => $cliente, 'productos' => $productos, 'request' => $request, 'experto' => $experto, 'tipos' => $tipos, 'categorias' => $categorias, 'categoriasCarros' => $categoriasCarros, 'categoriasMotos' => $categoriasMotos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Cliente $cliente, Product $producto)
    {
        // dd($request->input());
        if ($request->all()) {

            if ($request->input('correo')) {
                $this->sendMailService->make($request, $cliente, $producto);
            } else {
                $mensaje = $request->input('mensaje');
                if ($cliente->vendedor != null)
                    $pdf = PDF::loadView('clientes.pdf_nuevo', ['cliente' => $cliente, 'producto' => $producto, "request" => $request->all(), "empleado" => $cliente->vendedor->empleado, 'mensaje' => $mensaje]);
                else
                    $pdf = PDF::loadView('clientes.pdf_nuevo', ['cliente' => $cliente, 'producto' => $producto, "request" => $request->all(), "empleado" => Auth::user()->empleado, 'mensaje' => $mensaje]);
            }

            $transaction = new Transaction;

            $existe_cotizacion = Transaction::where('cliente_id', $cliente->id)
                ->where('product_id', $producto->id)
                ->where('status', 'cotizacion')
                ->first();

            if (!$existe_cotizacion) {
                $transaction->cliente_id = $cliente->id;
                $transaction->product_id = $producto->id;
                $transaction->status = "cotizacion";
                $transaction->save();
            }

            alert()->success('Success', 'Cotización generada con éxito');


            //return redirect()->back()->with('success', 'Producto añadido con exito');
            return isset($pdf) ? $pdf->download('cotizacion.pdf') : redirect()->back();
        } else {
            return back();
        }
        return back();
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}

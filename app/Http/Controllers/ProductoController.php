<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Producto;
use App\Informacion;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $buscar=$request->buscar;
        $criterio=$request->criterio;
        if($buscar==''){
            $productos=Producto::orderBy('id','desc')->paginate(4);
        }else{
            $productos=Producto::where($criterio,'like','%'.$buscar.'%')
                                ->orderBy('id','desc')
                                ->paginate(3);
        }

        return[
            'pagination' => [
                'total'        => $productos->total(),
                'current_page' => $productos->currentPage(),
                'per_page'     => $productos->perPage(),
                'last_page'    => $productos->lastPage(),
                'from'         => $productos->firstItem(),
                'to'           => $productos->lastItem(),
            ],
            'productos'=>$productos
        ];
        
    }

    public function selectProducto(Request $request){
        if (!$request->ajax()) return redirect('/');

        $productos = Producto::select('id','producto','stock')->orderBy('producto','asc')->get();
        return ['productos'=>$productos];
    }
    public function selectProductoSalida(Request $request){
        if (!$request->ajax()) return redirect('/');

        $productos = Producto::select('id','producto','stock')
        ->where('stock','>','0')
        ->orderBy('producto','asc')->get();
        return ['productos'=>$productos];
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        try{
            DB::beginTransaction();
            $productos = new Producto();
            $productos->producto=$request->producto;
            $productos->stock=0;
            $productos->save();

            $informaciones=new Informacion();
            $informaciones->id_producto=$productos->id;
            $informaciones->periodo = $request->periodo;
            $informaciones->ruc = $request->ruc;
            $informaciones->apellidos_nombres_dr = $request->apellidos_nombres_dr;
            $informaciones->establecimiento = $request->establecimiento;
            $informaciones->codigo_existencia = $request->codigo_existencia;
            $informaciones->tipo_existencia = $request->tipo_existencia;
            $informaciones->descripcion = $request->descripcion;
            $informaciones->unidad_medida = $request->unidad_medida;
            $informaciones->metodo_valuacion = $request->metodo_valuacion;
            $informaciones->save();
            DB::commit();
        }catch (Exception $e){
            DB::rollBack();
        }
        
    }

    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        
        $productos = Producto::findOrFail($request->id);
        $productos->producto=$request->producto;
        //$productos->stock=$request->stock;
        $productos->save();
    }
    public function listarPdf(){
        $productos=Producto::orderBy('id','desc')->get();
        $cont=Producto::count();
        //$pdf=\PDF::loadView('pdf.productospdf',['productos'=>$productos,'cont'=>$cont])->setPaper('a4', 'landscape'); //horizontal
        $pdf=\PDF::loadView('pdf.productospdf',['productos'=>$productos,'cont'=>$cont]);
        return $pdf->stream('productos.pdf');
    }
}

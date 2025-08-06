<?php

namespace App\Http\Controllers;

use App\Models\Detalle_Venta;
use App\Models\Producto;
use App\Models\Venta;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class DetalleVentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $titulo = "Detalle de Venta";
        $items = Venta::select(
            'ventas.*',
            'users.name as nombre_usuario'
        )
        ->join('users', 'ventas.user_id', '=', 'users.id')
        ->orderBy('ventas.created_at', 'desc')
        ->get();
        return view("modules.detalles_ventas.index", compact('titulo', 'items'));
    }

    public function vista_detalle($id){
        $titulo = "Detalle de Venta";
        $venta = Venta::select(
            'ventas.*',
            'users.name as nombre_usuario'
        )
        ->join('users', 'ventas.user_id', '=', 'users.id')
        ->where('ventas.id', $id)
        ->firstOrFail();

        $detalles = Detalle_Venta::select(
            'detalle_ventas.*',
            'productos.nombre as nombre_producto'
        )
        ->join('productos', 'detalle_ventas.producto_id', '=', 'productos.id')
        ->where('venta_id', $id)
        ->get();

        return view('modules.detalles_ventas.detalle_venta', compact('titulo', 'venta', 'detalles'));
    }

    public function revocar($id){
        DB::beginTransaction();
        try {
            $detalles = Detalle_Venta::select(
                'producto_id', 'cantidad'
            )
            ->wheere('venta_id', $id)
            ->get();

            //Devolver Stock
            foreach ($detalles as $detalle) {
                Producto::where('id', $detalle->producto_id)
                ->increment('cantidad', $detalle->cantidad);
            }

            //Eliminar productos vendidos y la venta
            Detalle_Venta::where('venta_id', $id)->delete();
            Venta::where('id', $id)->delete();

            DB::commit();
            return to_route('detalle-venta')->with("success", "Revocación de Venta con Exito!");
        } catch (Exception $e) {
            DB::rollBack();
            return to_route('detalle-venta')->with("error", "No se pudo Revocar la Venta!" . $e->getMessage());
        }
    }

    public function generarTicket($id){
        $venta = Venta::select(
            'ventas.*',
            'users.name as nombre_usuario'
        )
        ->join('users', 'ventas.user_id', '=', 'users.id')
        ->where('ventas.id', $id)
        ->firstOrFail();

        $detalles = Detalle_Venta::select(
            'detalle_ventas.*',
            'productos.nombre as nombre_producto'
        )
        ->join('productos', 'detalle_ventas.producto_id', '=', 'productos.id')
        ->where('venta_id', $id)
        ->get();

        $pdf = Pdf::loadView("modules.detalles_ventas.ticket", compact('venta', 'detalles'));
        //Descargar el pdf
        return $pdf->stream("ticket_compra_{$venta->id}.pdf");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentarios;

class ComentariosController extends Controller
{
     /**
     * Creacion de Comentario 
     * @param nombre string del nombre del Comentario
     *Comentario
     * @return array creacion exitosa y todos los Comentarios
     */
    public function postComentario(Request $request) {
        $req = $request->all();
        $contenido = isset($req['contenido']) ? $req['contenido'] : '';
        $post_id = isset($req['post_id']) ? $req['post_id'] : '';
        if ($contenido && $post_id) {
            Comentarios::create([
                'contenido'=>$contenido,
                'post_id'=>$post_id,
            ]);
            $finalresult = response()->json(['status' => true, 'message' =>'Comentario creada', 'data'=>Comentarios::all()]);
        }else {
                $finalresult = response()->json(['status' => false, 'message' =>'No envio datos necesarios']);
        }
        return $finalresult;
        
    }
    /**
     * Listar Comentarios
     * 
     * 
     * @return array todos los Comentarios
     */
    public function getComentarios()
    {
        return response()->json(['status' => true, 'data'=>Comentarios::all()]);
    }
     /**
     * Listar Comentario por id
     * 
     * @param id del Comentario a traer
     * 
     * @return array Comentario buscado
     */
    public function getComentario($id)
    {
        $Comentario=Comentarios::find($id);
        if ($Comentario == null) {
            return response()->json(['status' => false, 'message'=>'Comentario no encontrado']);
        } else{
            return response()->json(['status' => true, 'data'=>$Comentario]);
        }
    }
    /**
     * Editar Comentario por Id
     * 
     * @param id del Comentario a editar
     * 
     * @return array el Comentario editad
     */
    public function updateComentario(Request $request,$id)
    {
        $Comentario=Comentarios::find($id);
        if ($Comentario != null) {
            $Comentario->update($request->all());
            return response()->json(['status' => true, 'data'=>$Comentario]);
        } else {
            
            return response()->json(['status' => true, 'message'=>'No se encontro el Comentario']);
        }

    }
    /**
     * Eliminar Comentario por id
     * 
     * @param id del Comentario a eliminar
     * 
     * @return array confirmacion eliminacion
     */
    public function deleteComentario($id)
    {
        //
        if (Comentarios::destroy($id)) {
            return response()->json(['status' => true, 'message'=>'Comentario Eliminada']);
        } else {
            return response()->json(['status' => false, 'message'=>'Comentario no encontrada']);
        }
    }
}

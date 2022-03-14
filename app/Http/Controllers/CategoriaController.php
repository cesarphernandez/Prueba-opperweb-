<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Categoria;
use App\Models\Posts;
use App\Models\Comentarios;

class CategoriaController extends Controller
{
    /**
     * Creacion de categoria 
     * @param nombre string del nombre de la categoria
     * 
     * @return array creacion exitosa y todas las categorias
     */
    public function postCategoria(Request $request) {
        $req = $request->all();
        $nombre = isset($req['nombre']) ? $req['nombre'] : '';
        try {
            if ($nombre) {
                Categoria::create([
                    'nombre'=>$nombre
                ]);
                $finalresult = response()->json(['status' => true, 'message' =>'Categoria creada', 'data'=>Categoria::all()]);
            }else {
                    $finalresult = response()->json(['status' => false, 'message' =>'No envio datos necesarios']);
            }
        }catch(Exception $e){

            return response()->json(['status' => false,'message' =>$e->getMessage()]);
        }
        return $finalresult;
        
    }
    /**
     * Listar Categorias
     * 
     * 
     * @return array todas las categorias
     */
    public function getCategorias()
    {   
        $Categorias = Categoria::all();
        foreach($Categorias as $categoria) {
            $Posts = Posts::where('categorias_id',$categoria->id)->get();
            foreach($Posts as $post) {
                $Comentarios = Comentarios::where('post_id',$post->id)->get();
                $post->comentarios = $Comentarios;
            }
            $categoria->posts = $Posts;
        }
        return response()->json(['status' => true, 'data'=>$Categorias]);
    }
     /**
     * Listar Categorias por id
     * 
     * @param id de la categoria a traer
     * 
     * @return array categoria buscada
     */
    public function getCategoria($id)
    {
        $Categorias=Categoria::find($id);
        if ($Categorias == null) {
            return response()->json(['status' => false, 'message'=>'Categoria no encontrada']);
        } else{
            $Posts = Posts::where('categorias_id',$Categorias->id)->get();
            foreach($Posts as $post) {
                $Comentarios = Comentarios::where('post_id',$post->id)->get();
                $post->comentarios = $Comentarios;
            }
            $Categorias->posts = $Posts;
            return response()->json(['status' => true, 'data'=>$Categorias]);
        }
    }
    /**
     * Editar categoria por Id
     * 
     * @param id de la categoria a editar
     * 
     * @return array la categoria editada
     */
    public function updateCategoria(Request $request,$id)
    {
        $Categoria=Categoria::find($id);
        if ($Categoria != null) {
            $Categoria->update($request->all());
            $Posts = Posts::where('categorias_id',$Categoria->id)->get();
            foreach($Posts as $post) {
                $Comentarios = Comentarios::where('post_id',$post->id)->get();
                $post->comentarios = $Comentarios;
            }
            $Categoria->posts = $Posts;
            return response()->json(['status' => true, 'data'=>$Categoria]);
        } else {
            
            return response()->json(['status' => true, 'message'=>'No se encontro la categoria']);
        }

    }
    /**
     * Eliminar categoria por id
     * 
     * @param id de la categoria a eliminar
     * 
     * @return array confirmacion eliminacion
     */
    public function deleteCategoria($id)
    {
        //
        if (Categoria::destroy($id)) {
            return response()->json(['status' => true, 'message'=>'Categoria Eliminada']);
        } else {
            return response()->json(['status' => false, 'message'=>'Categoria no encontrada']);
        }
    }
}

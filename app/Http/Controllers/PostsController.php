<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Posts;
use App\Models\Comentarios;

class PostsController extends Controller
{
    /**
     * Creacion de Post 
     * @param nombre string del nombre del Post
     * 
     * @return array creacion exitosa y todos los Post
     */
    public function postPost(Request $request) {
        $req = $request->all();
        $titulo = isset($req['titulo']) ? $req['titulo'] : '';
        $contenido = isset($req['contenido']) ? $req['contenido'] : '';
        $categorias_id = isset($req['categorias_id']) ? $req['categorias_id'] : '';
        if ($contenido && $titulo) {
            Posts::create([
                'titulo'=>$titulo,
                'contenido'=>$contenido,
                'categorias_id'=>$categorias_id,
            ]);
            $finalresult = response()->json(['status' => true, 'message' =>'Post creada', 'data'=>Posts::all()]);
        }else {
                $finalresult = response()->json(['status' => false, 'message' =>'No envio datos necesarios']);
        }
        return $finalresult;
        
    }
    /**
     * Listar Post
     * 
     * 
     * @return array todos los Post
     */
    public function getPosts()
    {
        $Posts = Posts::all();
        foreach($Posts as $post) {
            $Comentarios = Comentarios::where('post_id',$post->id)->get();
            $post->comentarios = $Comentarios;
        }
        return response()->json(['status' => true, 'data'=>$Posts]);
    }
     /**
     * Listar Post por id
     * 
     * @param id del Post a traer
     * 
     * @return array post buscado
     */
    public function getPost($id)
    {
        $Post=Posts::find($id);
        if ($Post == null) {
            return response()->json(['status' => false, 'message'=>'Post no encontrado']);
        } else{
            $Comentarios = Comentarios::where('post_id',$Post->id)->get();
            $Post->comentarios = $Comentarios;
            return response()->json(['status' => true, 'data'=>$Post]);
        }
    }
    /**
     * Editar Post por Id
     * 
     * @param id del Post a editar
     * 
     * @return array el Post editad
     */
    public function updatePost(Request $request,$id)
    {
        $Post=Posts::find($id);
        if ($Post != null) {
            $Post->update($request->all());
            $Comentarios = Comentarios::where('post_id',$Post->id)->get();
            $Post->comentarios = $Comentarios;
            return response()->json(['status' => true, 'data'=>$Post]);
        } else {
            
            return response()->json(['status' => true, 'message'=>'No se encontro el post']);
        }

    }
    /**
     * Eliminar Post por id
     * 
     * @param id del Post a eliminar
     * 
     * @return array confirmacion eliminacion
     */
    public function deletePost($id)
    {
        //
        if (Posts::destroy($id)) {
            return response()->json(['status' => true, 'message'=>'Post Eliminada']);
        } else {
            return response()->json(['status' => false, 'message'=>'Post no encontrada']);
        }
    }
}

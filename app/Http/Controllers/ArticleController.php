<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function ajoutArticle(Request $request){
        $article = new Article();
        $article->nom = $request->input('nom');
        $article->description = $request->input('description');
        $article->prix = $request->input('prix')."F";
        $article->save();

        return response()->json([
            "article" => $article,
            "message" => "Article ajouté avec succès"	
        ]);
    }

    public function listeArticle(){
        $article = new Article();
        return response()->json($article->all());
    }

    public function voirArticle($id, Request $request){
        $article = Article::find($id);
        if($article){
            return response()->json([
                "id"=>$article->id,
                "nom"=>$article->nom,
                "description"=>$article->description,
                "prix"=>$article->prix
            ]);
        }
        return response()->json([
            "message" => "Aucun article trouvé avec l'id ".$id
        ], 404);
    }

    public function modifArticle(Request $request, $id){
    $article = Article::find($id);
    
    // $request->validate([
    //     'nom' => 'required|string|max:255',
    //     'description' => 'required|string|max:500',
    //     'prix' => 'required|numeric',
    // ]);

    if ($article) {
        $article->nom = $request->input('nom');
        $article->description = $request->input('description');
        $article->prix = $request->input('prix');
        $article->save();

        return response()->json([
            "article" => $article,
            "message" => "Article modifié avec succès"
        ]);
    }

    return response()->json([
        "message" => "Aucun article trouvé avec l'id " . $id
    ], 404);
}

public function suppArticle($id){
    $article = Article::find($id);
    if($article){
        $article->delete();
        return response()->json([
            "message" => "Article supprimé avec succès"    
        ]);
    }
    return response()->json([
        "message" => "Aucun article trouvé avec l'id ".$id
    ], 404);
}


}

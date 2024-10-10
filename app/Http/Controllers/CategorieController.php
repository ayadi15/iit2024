<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Exception;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $categories = Categorie::all();
            return response()->json($categories);
        }catch(\Exception $e){
            return response()->json("probleme de recuperation des categories");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $categories =new Categorie([
                "nomcategorie"=>$request->input("nomcategorie"),
                "imagecategorie"=>$request->input("imagecategorie"),
            ]);
            $categories->save();
            return response()->json(($categories));
        }catch(\Exception $e){
            return response()->json("probleme de creation des categories");
        }
    }

    /**
     * Display the specified resource.
     */
   
    public function show($id)
        {
            try {
                $categorie = Categorie::findOrFail($id);
                return response()->json($categorie);
            } catch (\Exception $e) {
            return response()->json($e->getMessage());
            }
        }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        try{
            $categorie=Categorie::findOrFail($id);
            $categorie->update(request()->all());
            return response()->json("Categorie updated");
        }catch(\Exception $e){
            return response()->json($e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try{
            $categorie=Categorie::findOrFail($id);
            $categorie->delete();
            return response()->json("Categorie supprimee avec succes!!!!");
        }catch(\Exception $e){
            return response()->json($e->getMessage());

        }
    }
}

<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class postcontroller extends Controller
{
    public function index(){

        try{

            $posts= post::all();
        }catch(Exception $e){
            return response()->json([
                'data'=>[],
                'message'=>$e->getMessage()
            ],JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

         return response()->json([
            'data'=>$posts,
            'message'=> 'succeed'
         ], JsonResponse::HTTP_OK);

    }

    public function show($id){
    
    
        try {
            $posts = Post::find($id);
        } catch (Exception $e) {
            return response()->json([
                'data' => [],
                'message'=>$e->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'data' => $posts,
            'message' => 'Succeed'
        ], JsonResponse::HTTP_OK);
    }

    public function store(Request $request)
    {
        try {
            $posts = Post::create($request->all());
        } catch (Exception $e) {
            return response()->json([
                'data' => [],
                'message'=>$e->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'data' => $posts,
            'message' => 'Succeed'
        ], JsonResponse::HTTP_OK);
    }

    public function Editpost(Request $request, $id ){
        try{
            $posts=post::find($id)->update($request->all());
        } catch(Exception $e){
            return response()->json([
                "data"=>[],
                "message"=>$e->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
        return response()->json([
            'data'=>$posts,
            'message'=>'succeed'
        ], JsonResponse::HTTP_OK);
    }

    public function destroy($id)
    {
        try {
            $posts = Post::destroy($id);
        } catch (Exception $e) {
            return response()->json([
                'data' => [],
                'message'=>$e->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'data' => $posts,
            'message' => 'Succeed'
        ], JsonResponse::HTTP_OK);
    }
    }




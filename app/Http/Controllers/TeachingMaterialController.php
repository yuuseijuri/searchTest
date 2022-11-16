<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeachingMaterial;
use App\Models\Medium;
use App\Models\Category;

class TeachingMaterialController extends Controller
{
    public function index(Request $request) {
        // 検索フォームに入力された値を取得
        $keyword = $request->input('keyword', 'name');
        
        $medium = $request->input('medium_id', 'medium');
        
        $category = $request->input('category_id', 'category');
        
        $query = TeachingMaterial::query();
        // dd($query);
        //テーブル結合
        //リレーション先のテーブルのカラムも検索対象になっているので、joinでテーブル結合します。
        // $query->join('media', function($query) use ($request) {
        //     $query->on('teaching_materials.medium_id', '=', 'media.id');
        // })->join('categories', function($query) use ($request) {
        //     $query->on('teaching_materials.category_id', '=', 'categories.id');
        // });

        if(!empty($medium)) {
            $query->where('medium_id', '$medium');
        }

        if(!empty($category)) {
            $query->where('category_id', '$category');
        }

        if(!empty($keyword)) {
            $query->where('name', 'like', "%{ $keyword }%");
        }

        if((!empty($medium)) && (!empty($category))) {
            $query->where('medium_id', $medium)->where('category_id', $category);
        }

        if(((!empty($medium))) && (!empty($category)) && (!empty($keyword))) {
            $query->where('medium_id', $medium)->where('category_id', $category)->where('name','like', "%{ $keyword }%");
        }

        if((empty($medium)) && (empty($category)) && (empty($keyword))) {
            $query->with('medium', 'category', 'keyword')->get();
        }

        $items = $query->get();
        
        $media_list = Medium::all();
        
        $categories_list = Category::all();

        return view('index', compact('medium', 'category', 'keyword', 'items', 'media_list', 'categories_list'));
    }
}
//  public function index(Request $request) {
//         // 検索フォームに入力された値を取得
//         $keyword = $request->input('name');
        
//         $medium = $request->input('medium_id');
        
//         $category = $request->input('category_id');
        
//         $query = TeachingMaterial::query();
//         dd($query);
//         //テーブル結合
//         //リレーション先のテーブルのカラムも検索対象になっているので、joinでテーブル結合します。
//         // $query->join('media', function($query) use ($request) {
//         //     $query->on('teaching_materials.medium_id', '=', 'media.id');
//         // })->join('categories', function($query) use ($request) {
//         //     $query->on('teaching_materials.category_id', '=', 'categories.id');
//         // });

//         if(!empty($medium)) {
//             $query->where('medium', 'like', "%{ $medium }%");
//         }

//         if(!empty($category)) {
//             $query->where('category', 'like', "%{ $category }%");
//         }

//         if(!empty($keyword)) {
//             $query->where('name', 'like', "%{ $keyword }%");
//         }

//         $items = $query->get();
        
//         $media_list = Medium::all();
        
//         $categories_list = Category::all();

//         return view('index', compact('medium', 'category', 'keyword', 'items', 'media_list', 'categories_list'));
//     }
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeachingMaterial;
use App\Models\Medium;
use App\Models\Category;

class TeachingMaterialController extends Controller
{
    public function index(Request $request) {

        //検索フォームに入力された値を取得
        $medium = $request->input('medium');
        $category = $request->input('category');
        $keyword = $request->input('keyword');

        $query = TeachingMaterial::query();

        //テーブル結合
        //リレーション先のテーブルのカラムも検索対象になっているので、joinでテーブル結合します。
        $query->join('media', function($query) use ($request) {
            $query->on('teaching_materials.medium_id', '=', 'media.id');
        })->join('categories', function($query) use ($request) {
            $query->on('teaching_materials.category_id', '=', 'categories.id');
        });

        if(!empty($medium)) {
            $query->where('medium', 'like', '$medium');
        }

        if(!empty($category)) {
            $query->where('category', 'like', '$category');
        }

        if(!empty($keyword)) {
            $query->where('name', 'like', "%{ $keyword }%");
        }

        $items = $query->get();

        $media_list = Medium::all();

        $categories_list = Category::all();

        return view('index', compact('medium', 'category', 'keyword', 'items', 'media_list', 'categories_list'));
    }
}
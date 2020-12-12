<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Content;

class ContentController extends Controller
{
    //投稿画面表示
    public function input()
   	{
   		return view("contents.input");
   	}

   	//投稿内容を保存
   	public function save(Request $request)
   	{
   		$input_content = new Content();
   		$input_content->content = $request["content"];
   		$input_content->save();

   		return redirect(route("index"));
   	}

   	//投稿一覧表示
   	public function index()
   	{
   		$contents_get_query = Content::select("*");
   		$items = $contents_get_query->get();

   		return view("contents.index", [
   			"items" => $items,
   		]);
   	}

   	//投稿詳細表示
   	public function show($content_id)
   	{
   		$content_get_query = Content::select("*");
   		// content->idを$itemに格納
   		$item = $content_get_query->find($content_id);

   		return view("contents.show", [
   			"item" => $item,
   		]);
   	}

   	//投稿内容の編集画面
   	public function edit($content_id)
   	{
   		$content_get_query = Content::select("*");
   		$item = $content_get_query->find($content_id);

   		return view("contents.edit", [
   			"item" => $item,
   		]);
   	}

   	//投稿内容の更新
   	public function update(Request $request)
   	{
   		$content_get_query = Content::select("*");
   		$content_info = $content_get_query->find($request["id"]);
   		$content_info->content = $request["content"];
   		$content_info->save();

   		return redirect(route("index"));
   	}

   	//投稿の削除
   	public function delete(Request $request)
   	{
   		$contents_delete_query = Content::select("*");
   		$contents_delete_query->find($request["id"]);
   		$contents_delete_query->delete();

   		return redirect(route("index"));
   	}
}

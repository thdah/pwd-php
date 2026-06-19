<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {

        $data = [
            ["title" => "First Article"],
            ["title" => "Second Article"]
        ];
        return view("articles.index", [
            "articles" => $data
        ]);
    }

    public function detail(string $id) {
        return "Article Controller Detail - $id";
    }
}

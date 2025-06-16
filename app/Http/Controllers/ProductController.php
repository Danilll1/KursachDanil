<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        $title = "Home Page";
        $user = Auth::user();
        $products = Product::query()->with(['category', 'status'])->orderBy('id', 'desc')->paginate(12);
    
        return view('products.index', compact('user', 'products', 'title' ));
    }

    public function show($slug)
    {
        $product = Product::query()->with(['category', 'status'])->where('slug', $slug)->firstOrFail();
        return view('products.show', compact('product'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::query()
            ->with(['category', 'status'])
            ->where('id', '=', $query) // Поиск по id
            ->orWhere('title', 'LIKE', "%{$query}%") // Поиск по title
            ->orWhere('slug', 'LIKE', "%{$query}%") // Поиск по slug
            ->orWhere('content', 'LIKE', "%{$query}%") // Поиск по content
            ->orWhere('price', 'LIKE', "%{$query}%")
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('products.index', compact('products'));

        if (empty($query)) {
            return redirect()->back()->withErrors(['message' => 'Введите запрос для поиска.']);
        }
    }   
}

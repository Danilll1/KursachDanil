<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Admin Panel";
        $products = Product::orderBy("id")->paginate(1);

        return view('admin.index', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $statuses = Status::all();

        return view('admin.create', compact('categories', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Валидация входящих данных
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'data_id' => 'required|numeric',
            'content' => 'required|string',
            'sale' => 'nullable|numeric',
            'hit' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'status_id' => 'required|exists:statuses,id',
            'img' => 'nullable|image', 
        ]);

        $product = new Product();
        $product->fill($request->except('img'));
        $product->slug = Str::slug($request->title);
        $product->data_id = $request->input('data_id');


        if ($request->hasFile('img')) {
            if ($product->img && Storage::exists($product->img)) {
                Storage::delete($product->img);
            }
            $path = $request->file('img')->store('images', 'public');
            $product->img = $path;
        }

        $product->save();

        // Перенаправление с сообщением об успехе
        return redirect()->route('admin.create')->with('success', 'Пост успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $categories = Category::all();
        $statuses = Status::all();

        return view('admin.create', compact('categories', 'statuses'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Валидация входящих данных
    // dd($request->all());
    $request->validate([
        'title' => 'required|string|max:255',
        'data_id' => 'required|numeric',
        'price' => 'required|numeric',
        'content' => 'required|string|max:255',
        'category_id' => 'required|numeric',
        'status_id' => 'required|numeric',
        'hit' => 'required|numeric',
        'sale' => 'required|numeric',
        'img' => 'nullable|image',
    ]);

    // Находим товар по ID
    $product = Product::find($id);
    
    if (!$product) {
        return redirect()->back()->withErrors(['error' => 'Товар не найден.']);
    }

    // Обновляем данные товара
    $product->data_id = $request->input('data_id');
    $product->title = $request->input('title');
    $product->price = $request->input('price');
    $product->content = $request->input('content');
    $product->category_id = $request->input('category_id');
    $product->status_id = $request->input('status_id');
    $product->hit = $request->input('hit');
    $product->sale = $request->input('sale');

    // Обработка изображения
    if ($request->hasFile('img')) {
        // Удаляем старое изображение
        if ($product->img && Storage::exists($product->img)) {
            Storage::delete($product->img);
        }
        // Сохраняем новое изображение
        $path = $request->file('img')->store('images', 'public');
        $product->img = $path;
    }

    // Сохраняем изменения
    $product->save();

    return redirect()->route('products.index', compact('product'))->with('success', 'Товар успешно обновлён!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'Deleted.');
    }
}

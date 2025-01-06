<?php

namespace App\Http\Controllers;

use App\Models\Product;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use Omaralalwi\Gpdf\Facade\Gpdf as GpdfFacade;
use PDF;

class ProductsListController extends Controller
{
    // use PDF;  // Add this at the top of your controller

    public function index()
    {
        $show = Product::orderBy('created_at', 'desc')->get();

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'default_font_size' => 12,
            'margin_left' => 15,
            'margin_right' => 15,
            'margin_top' => 16,
            'margin_bottom' => 16,
            'margin_header' => 9,
            'margin_footer' => 9,
            'direction' => 'ltr'
        ]);

        $mpdf->AddFontDirectory('Tajawal-Regular', 'R', public_path('fonts/Tajawal-Regular.ttf'));
        $mpdf->AddFontDirectory('Tajawal-Bold', 'B', public_path('fonts/Tajawal-Bold.ttf'));

        $html = view('ProductList', compact('show'))->render();
        $mpdf->WriteHTML($html);

        return $mpdf->Output('ProductList.pdf', 'D');
    }

    public function indexWeb()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(50);
        return view('ProductListWeb', compact('products'));
    }

    public function create()
    {
        return view('generateProduct');
    }

    public function show(Product $product)
    {
        return $product;  // retrun "dd";
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }
        Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'image' => $validated['image'] ?? null
        ]);

        return redirect()
            ->route('products.index-web')
            ->with('success', 'Product added successfully');
    }

    public function edit(Product $product)
    {
        return view('updateProductList', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }
        $product->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'image' => $validated['image'] ?? null
        ]);

        return redirect()
            ->route('products.index-web')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index-web')
            ->with('success', 'Product deleted successfully');
    }
}

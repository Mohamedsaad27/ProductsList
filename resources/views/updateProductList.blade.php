<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <style>
        .form-group { margin-bottom: 1rem; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <h1>Edit Product</h1>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')  <!-- Add this line for method spoofing -->
        <div class="form-group">
            <label for="name">اسم المنتج:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">السعر:</label>
            <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" step="0.01" required>
            @error('price')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">الصورة:</label>
            @if($product->image)
                <div>
                    <img src="{{ asset('images/' . $product->image) }}" alt="Current Product Image" style="max-width: 200px;">
                    <p>Current Image</p>
                </div>
            @endif
            <input type="file" id="image" name="image">
            @error('image')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Update Product</button>
        <a href="{{ route('products.index-web') }}" style="margin-left: 10px;">Cancel</a>
    </form>
</body>
</html>
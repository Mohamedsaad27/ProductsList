<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <style>
        .form-group { margin-bottom: 1rem; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <h1>Add New Product</h1>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">اسم المنتج:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">السعر:</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" required>
            @error('price')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">الصورة:</label>
            <input type="file" id="image" name="image" >
            @error('image')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Add Product</button>
    </form>
</body>
</html>
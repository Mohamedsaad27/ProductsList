<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Products List</title>
    <style>
        .container { 
            padding: 20px; 
            max-width: 1200px; 
            margin: 0 auto;
        }
        .success { 
            color: green; 
            padding: 10px;
            margin-bottom: 20px;
            background-color: #dff0d8;
            border: 1px solid #d6e9c6;
            border-radius: 4px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: right;
        }
        .table th {
            background-color: #f5f5f5;
        }
        .table tr:hover {
            background-color: #f9f9f9;
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn-primary {
            color: #fff;
            background-color: #337ab7;
            border-color: #2e6da4;
        }
        .btn-danger {
            color: #fff;
            background-color: #d9534f;
            border-color: #d43f3a;
        }
        .btn-warning {
            color: #fff;
            background-color: #f0ad4e;
            border-color: #eea236;
        }
        .product-image {
            max-width: 100px;
            height: auto;
        }
        .actions {
            display: flex;
            gap: 10px;
            justify-content: flex-start;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>قائمة المنتجات</h1>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <div style="margin-bottom: 20px;">
            <a href="{{ route('products.create') }}" class="btn btn-primary">إضافة منتج جديد</a>
        </div>

        @if($products->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الصورة</th>
                        <th>اسم المنتج</th>
                        <th>السعر</th>
                        <th>تاريخ الإنشاء</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('images/' . $product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="product-image">
                                @else
                                    <span>لا توجد صورة</span>
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->created_at->format('Y-m-d') }}</td>
                            <td class="actions">
                                <a href="{{ route('products.edit', $product->id) }}" 
                                   class="btn btn-warning">تعديل</a>
                                
                                <form action="{{ route('products.destroy', $product->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج؟');"
                                      style="display: inline;">
                                    @csrf
                                    @method('DELETE')  <!-- Add this line for method spoofing -->
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $products->links() }}
        @else
            <p>لا توجد منتجات متاحة.</p>
        @endif
    </div>
</body>
</html>
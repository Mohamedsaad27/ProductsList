<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #475569;
        }
        
        body {
            background-color: #f8fafc;
            font-family: system-ui, -apple-system, sans-serif;
        }
        
        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 12px;
            transition: transform 0.2s;
        }
        
        .product-image:hover {
            transform: scale(1.1);
        }
        
        .table {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }
        
        .table > :not(caption) > * > * {
            padding: 1rem;
            vertical-align: middle;
        }
        
        .table thead {
            background-color: #f1f5f9;
        }
        
        .table tbody tr {
            transition: background-color 0.2s;
        }
        
        .table tbody tr:hover {
            background-color: #f8fafc;
        }
        
        .btn {
            border-radius: 8px;
            padding: 0.5rem 1rem;
            transition: all 0.2s;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
        }
        
        .btn-primary:hover {
            background-color: #1d4ed8;
            transform: translateY(-1px);
        }
        
        .btn-warning {
            background-color: #eab308;
            border: none;
            color: white;
        }
        
        .btn-danger {
            background-color: #dc2626;
            border: none;
        }
        
        .alert {
            border-radius: 12px;
            border: none;
        }
        
        .card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
        }
        
        .page-link {
            color: var(--primary-color);
            border-radius: 8px;
            margin: 0 2px;
        }
        
        .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4 animate__animated animate__fadeIn">
            <h2 class="fw-bold text-gray-800">قائمة المنتجات</h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> إضافة منتج جديد
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeIn" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($products->count() > 0)
            <div class="card animate__animated animate__fadeInUp">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
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
                                            <div class="text-muted">لا توجد صورة</div>
                                        @endif
                                    </td>
                                    <td class="fw-medium">{{ $product->name }}</td>
                                    <td>{{ number_format($product->price, 2) }} ج.م</td>
                                    <td>{{ $product->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <div class="btn-group gap-2" role="group">
                                            <a href="{{ route('products.edit', $product->id) }}" 
                                                class="btn btn-warning btn-sm">تعديل</a>
                                            <form action="{{ route('products.destroy', $product->id) }}" 
                                                method="POST" 
                                                onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج؟');"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-center animate__animated animate__fadeIn">
                {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        @else
            <div class="alert alert-info animate__animated animate__fadeIn">
                لا توجد منتجات متاحة.
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
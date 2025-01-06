<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #f1f5f9, #f8fafc);
            min-height: 100vh;
        }
        
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            background: #2563eb;
            border-radius: 16px 16px 0 0 !important;
            padding: 1.5rem;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            transition: all 0.2s;
        }
        
        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.1);
        }
        
        .form-label {
            font-weight: 500;
            color: #475569;
            margin-bottom: 0.5rem;
        }
        
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: transform 0.2s;
        }
        
        .btn:hover {
            transform: translateY(-1px);
        }
        
        .btn-primary {
            background-color: #2563eb;
            border: none;
        }
        
        .btn-secondary {
            background-color: #475569;
            border: none;
        }
        
        .img-thumbnail {
            border-radius: 12px;
            border: 2px solid #e2e8f0;
        }
        
        .input-group-text {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 0 8px 8px 0;
        }
        
        .alert {
            border-radius: 12px;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card animate__animated animate__fadeIn">
                    <div class="card-header">
                        <h3 class="mb-0 text-white">تعديل المنتج</h3>
                    </div>
                    <div class="card-body p-4">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="name" class="form-label">اسم المنتج</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                    id="name" name="name" value="{{ old('name', $product->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="price" class="form-label">السعر</label>
                                <div class="input-group">
                                    <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                        id="price" name="price" value="{{ old('price', $product->price) }}" step="0.01" required>
                                    <span class="input-group-text">د.ك</span>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">الصورة</label>
                                @if($product->image)
                                    <div class="mb-3">
                                        <img src="{{ asset('images/' . $product->image) }}" 
                                            class="img-thumbnail" style="max-width: 200px; height: auto;" alt="Current Product Image">
                                        <p class="text-muted mt-2 small">الصورة الحالية</p>
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                    id="image" name="image">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('products.index-web') }}" class="btn btn-secondary">إلغاء</a>
                                <button type="submit" class="btn btn-primary">تحديث المنتج</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
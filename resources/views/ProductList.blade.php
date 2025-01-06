<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D-Seven Store - عرض المنتجات</title>
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .header {
            background: linear-gradient(135deg, #2c3e50, #3498db);
            color: white;
            padding: 25px;
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }

        .store-name {
            font-size: 32px;
            margin: 0;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .store-info {
            font-size: 18px;
            color: #ecf0f1;
            margin: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: white;
        }

        th {
            background-color: #34495e;
            color: white;
            padding: 15px;
            font-size: 16px;
            text-align: right;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .product-image {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
        }

        .price {
            font-weight: bold;
            color: #2ecc71;
        }

        footer {
            margin-top: 30px;
            padding: 20px;
            background-color: #2c3e50;
            color: white;
            text-align: center;
            font-size: 14px;
        }

        .page-number {
            text-align: center;
            font-size: 12px;
            color: #666;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{asset('photo_2024-11-09_18-56-30.jpg')}}" alt="D-Seven Store Logo" class="logo">
        <h1 class="store-name">D-Seven Store</h1>
        <p class="store-info">العنوان: نجع حمادي، قنا، مصر</p>
        <p class="store-info">هاتف: 01021369699</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>الصورة</th>
                <th>اسم المنتج</th>
                <th>السعر</th>
            </tr>
        </thead>
        <tbody>
            @foreach($show as $product)
            <tr>
                <td><img src="{{asset('images/'.$product->image)}}" alt="{{ $product->name }}" class="product-image"></td>
                <td>{{ $product->name }}</td>
                <td class="price">{{ number_format($product->price, 2) }} ج.م</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <footer>
        <p>جميع الحقوق محفوظة © {{ date('Y') }} D-Seven Store</p>
    </footer>

    <div class="page-number">
        {PAGENO}
    </div>
</body>
</html>

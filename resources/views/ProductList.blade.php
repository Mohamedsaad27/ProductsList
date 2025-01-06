<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="D-Seven Store - عرض منتجاتنا">
    <meta name="keywords" content="منتجات, تسوق, D-Seven Store">
    <meta name="author" content="D-Seven Store">
    <title>D-Seven Store - عرض المنتجات</title>
    <style>
        body {
            font-family: 'cairo', sans-serif;
            direction: ltr;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .title-section {
            background-color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .logo {
            width: 120px;
            height: auto;
            margin-bottom: 15px;
        }
        .store-name {
            color: #333;
            font-size: 28px;
            margin: 10px 0;
            font-weight: bold;
        }
        .store-info {
            color: #666;
            font-size: 16px;
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: right;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
        }
        img {
            max-width: 100px;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 5px;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
            font-size: 14px;
        }
        @media (max-width: 768px) {
            .store-name {
                font-size: 24px;
            }
            .store-info {
                font-size: 14px;
            }
            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="title-section">
        <img src="{{ asset('photo_2024-11-09_18-56-30.jpg') }}" alt="D-Seven Store Logo" class="logo">
        <h1 class="store-name" style="font-family: 'Cairo', sans-serif;">D-Seven Store</h1>
        <p class="store-info" style="font-family: 'Cairo', sans-serif;">العنوان: نجع حمادي ، قنا، مصر</p>
        <p class="store-info" style="font-family: 'Cairo', sans-serif;">هاتف: 01021369699</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="font-family: 'Cairo', sans-serif;">السعر</th>
                <th style="font-family: 'Cairo', sans-serif;">اسم المنتج</th>
                <th style="font-family: 'Cairo', sans-serif;">الصورة</th>
            </tr>
        </thead>
        <tbody>
            @foreach($show as $product)
            <tr>
                <td style="font-family: 'Cairo', sans-serif;">{{ $product->price }} ج.م</td>
                <td style="font-family: 'Cairo', sans-serif;">{{ $product->name }}</td>
                <td><img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <footer>
        <p style="font-family: 'Cairo', sans-serif;">جميع الحقوق محفوظة © {{ date('Y') }} - D-Seven Store</p>
    </footer>
</body>
</html>
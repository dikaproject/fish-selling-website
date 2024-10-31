<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>
    <h1>Available Products</h1>
    <ul>
        @foreach ($products as $product)
            <li>
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <p>Price: {{ $product->price }} IDR</p>
                <a href="{{ route('products.buy', $product->id) }}">Buy Now</a>
            </li>
        @endforeach
    </ul>
</body>
</html>

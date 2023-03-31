<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>

<h1>A Fancy Table</h1>
@if(session()->has('sucess'))
    {{session()->get('sucess')}}
@endif
<table id="customers">
    <tr>
        <th>image</th>
        <th>name</th>
        <th>price</th>
        <th>operations</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td><img src="{{asset('images/'.$product->image)}}" height="50px"></td>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td>
            <a href="{{route('products.show', ['id' => $product->id])}}">show</a>
            <a href="{{route('products.edit', ['id' => $product->id])}}">edit</a>
            <form action="{{route('products.destroy', ['id' => $product->id])}}" method="post">
                @csrf
                <input type="submit" value="delte">
            </form>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>



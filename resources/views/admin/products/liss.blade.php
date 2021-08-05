@extends('admin.main')
@section('admin_content')
<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width:50px">ID</th>
                <th>Tên Sản Phẩm</th>
                <th>Thuộc Menu</th>
                <th>Giá Gốc</th>
                <th>Giá Giảm</th>
                <th>Active</th>
                <th style="width:200px"> &nbsp; </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
                <tr>
                    <td>  {{ $product->id }} </td>
                    <td>  {{ $product->name }} </td>
                    <td>  {{ $product->menu->name }} </td>
                    <td>  {{ $product->price }} </td>
                    <td>  {{ $product->price_sale }} </td>
                    <td>  {!! \App\Helpers\Helper::getActive($product->active) !!} </td>
                    <td>
                        <a href="/admin/products/edit/{{$product->id}}">
                            <i class="fas fa-edit"></i>
                        </a> &nbsp;
                        <a href="#" onclick=" removeRow({{$product->id}}, '/admin/products/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $products->links() !!}
</div>
@endsection
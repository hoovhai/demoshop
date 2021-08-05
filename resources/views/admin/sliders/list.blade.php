@extends('admin.main')
@section('admin_content')
<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width:50px">ID</th>
                <th>Tên Slider</th>
                <th>Url</th>
                <th>Thumb</th>
                <th>Sắp xếp</th>
                <th>Active</th>
                <th style="width:200px"> &nbsp; </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $key => $slider)
                <tr>
                    <td>  {{ $slider->id }} </td>
                    <td>  {{ $slider->name }} </td>
                    <td>  {{ $slider->url }} </td>
                    <td>  
                        <a href="{!! $slider->thumb !!}" target="_blank">
                            <img src="http://shoplaravel.test{!! $slider->thumb !!}" width="100px"> 
                        </a>
                    </td>
                    <td>  {{ $slider->sort_by }} </td>
                    <td>  {!! \App\Helpers\Helper::getActive($slider->active) !!} </td>
                    <td>
                        <a href="/admin/sliders/edit/{{$slider->id}}">
                            <i class="fas fa-edit"></i>
                        </a> &nbsp;
                        <a href="#" onclick=" removeRow({{$slider->id}}, '/admin/sliders/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $sliders->links() !!}
</div>
@endsection
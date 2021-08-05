@extends('admin.main')
@section('admin_content')
    <!-- form start -->
        <form action="add" method="post">
            {{ csrf_field() }}
            <div class="card-body">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> Tên Sản Phẩm </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{ old('name')}}" placeholder="Tên Sản Phẩm" name="name">
                    </div>
    
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> Thuộc Danh Mục </label>
                        <select class="form-control" name="menu_id">
                            @foreach ($menus as $key => $menu)
                                <option value="{{ $menu->id }}"> {{ $menu->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputNumber1"> Giá Sản Phẩm </label>
                        <input type="number" class="form-control" id="exampleInputNumber1" value="{{ old('price')}}" placeholder="Giá Sản Phẩm" name="price">
                    </div>
    
                    <div class="form-group col-md-6">
                        <label for="exampleInputNumber2"> Giá Giảm </label>
                        <input type="number" class="form-control" id="exampleInputNumber2" placeholder="Giá Giảm" value="{{ old('price_sale')}}" name="price_sale">
                    </div>
                </div>

                <div class="form-group">
                    <label for="editor1"> Mô Tả Ngắn Sản Phẩm </label>
                    <textarea class="form-control" name="description" value="{{ old('description')}}"></textarea>
                </div>

                <div class="form-group">
                    <label for="editor1"> Mô Tả Chi Tiết Sản Phẩm </label>
                    <textarea class="form-control" id="editor1" name="content" value="{{ old('content')}}"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="form-control" id="upload">
                        </div>
                    </div>
                    <div id="image_show">
                                
                    </div>
                    <input type="hidden" name="thumb" id="file"> 
                </div>

                <div class="form-group">
                    <label for="form-check"> Trạng Thái  </label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="exampleCheck1" name="active" value="1">
                        <label class="form-check-label" for="exampleCheck1"> Kích hoạt </label>
                        <br>
                        <input type="radio" class="form-check-input" id="exampleCheck2" name="active" value="0">
                        <label class="form-check-label" for="exampleCheck2"> Ẩn </label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"> Tạo Sản Phẩm </button>
            </div>
        </form>
        <!-- /.card-body -->
@endsection
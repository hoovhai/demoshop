@extends('admin.main')
@section('admin_content')
    <!-- form start -->
        <form action="add" method="post">
            {{ csrf_field() }}
            <div class="card-body">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> Tên Slider </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="" placeholder="Tên Slider" name="name">
                    </div>
    
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> Đường dẫn </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="" placeholder="" name="url">
                    </div>
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
                    <label for="exampleInputEmail1"> Sắp xếp </label>
                    <input type="number" class="form-control" id="exampleInputEmail1" value="" placeholder="" name="sort_by">
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
                <button type="submit" class="btn btn-primary"> Thêm Slider </button>
            </div>
        </form>
        <!-- /.card-body -->
@endsection
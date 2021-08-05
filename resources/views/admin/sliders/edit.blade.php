@extends('admin.main')
@section('admin_content')
    <!-- form start -->
        <form action="" method="post">
            {{ csrf_field() }}
            <div class="card-body">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> Update Tên Slider </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="" placeholder="{{$slider->name}}" name="name">
                    </div>
    
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> Update Đường dẫn </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="" placeholder="{{$slider->url}}" name="url">
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile"> Update File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="form-control" id="upload">
                        </div>
                    </div>
                    <div id="image_show">
                        <a href="{{$slider->thumb}}" class="href">
                            <img src="{{$slider->thumb}}" alt="" class="src" width="100px">
                        </a>
                    </div>
                    <input type="hidden" name="thumb" value="{{$slider->thumb}}" id="file"> 
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1"> Update Sắp xếp </label>
                    <input type="number" class="form-control" id="exampleInputEmail1" value="" placeholder="{{$slider->sort_by}}" name="sort_by">
                </div>

                <div class="form-group">
                    <label for="form-check"> Update Trạng Thái  </label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="exampleCheck1" name="active" value="1" @if($slider->active == 1) checked @endif>
                        <label class="form-check-label" for="exampleCheck1"> Kích hoạt </label>
                        <br>
                        <input type="radio" class="form-check-input" id="exampleCheck2" name="active" value="0" @if($slider->active == 0) checked @endif>
                        <label class="form-check-label" for="exampleCheck2"> Ẩn </label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"> Update Slider </button>
            </div>
        </form>
        <!-- /.card-body -->
@endsection
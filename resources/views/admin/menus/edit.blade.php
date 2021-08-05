@extends('admin.main')
@section('admin_content')
    <!-- form start -->
        <form action="" method="post">
            {{ csrf_field() }}
            <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputEmail1"> Sửa Tên Danh Mục </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" {{ $menu->name }} " name="name">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1"> Danh Mục </label>
                    <select class="form-control" name="parent_id">
                        <option value="0" {{ $menu->parent_id==0 ? 'selected' : '' }}> Danh Mục Cha </option>
                        @foreach ($menus as $key => $menuParent)
                            <option value="{{ $menuParent->id }}" {{ $menuParent->id==$menu->parent_id ? 'selected' : '' }}> {{ $menuParent->name }} </option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="editor1"> Mô Tả Ngắn </label>
                    <textarea class="form-control" name="description"> {{$menu->description}} </textarea>
                </div>

                <div class="form-group">
                    <label for="editor1"> Mô Tả Chi Tiết </label>
                    <textarea class="form-control" id="editor1" name="content">{{$menu->content}} </textarea>
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                    </div>
                </div> --}}
                <div class="form-group">
                    <label for="form-check"> Trạng Thái  </label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="exampleCheck1" name="active" value="1" @if($menu->active == 1) checked @endif>
                        <label class="form-check-label" for="exampleCheck1"> Kích hoạt </label>
                        <br>
                        <input type="radio" class="form-check-input" id="exampleCheck2" name="active" value="0" @if($menu->active == 0) checked @endif>
                        <label class="form-check-label" for="exampleCheck2"> Ẩn </label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"> Sửa Danh Mục </button>
            </div>
        </form>
        <!-- /.card-body -->
@endsection
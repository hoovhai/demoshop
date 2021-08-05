@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<?php if (Session::get('error')) { ?>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Có Lỗi! <?php echo Session::get('error') ?> </h5>
        <?php Session::forget('error');?>
    </div>
    <?php } ?>
    
    <?php if (Session::get('success')) { ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Thành Công! <?php echo Session::get('success') ?> </h5>
        <?php Session::forget('success')?>
    </div>
<?php } ?>
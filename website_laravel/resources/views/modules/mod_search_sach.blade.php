
<div class="container">
    <form action="" method="GET" class="form-horizontal" role="form">
        <div class="form-group">
            <legend>Tìm sách</legend>
        </div>
    
        <div class="form-group">
            <div class="col-sm-2">
                Loại sách
            </div>
            <div class="col-sm-10">
                <select name="id_loai_sach" id="" class="form-control" >
                    @foreach($ds_loai_sach as $loai_sach)
                        
                        <option value="{{$loai_sach->id}}"
                            @if($loai_sach->id == $id_loai_sach)
                            selected="true"
                            @endif
                        >{{$loai_sach->ten_loai_sach}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    
        <div class="form-group">
            <div class="col-sm-2">
                Từ khóa
            </div>
            <div class="col-sm-10">
                <input type="text" name="search" id="input" class="form-control" value="{{$search}}">
            </div>
        </div>
    
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary">
                    
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    
                </button>
            </div>
        </div>
    </form>    
</div>
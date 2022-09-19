<div id="modal_response_show">   
    <div id="modal_detail">
        @foreach ($data['Product'] as $key)
        
        <div class="form-floating my-2 my-sm-0">
            <input type="text" class="form-control" id="Pcode" placeholder="Product Code" name="Pcode" value="{{$key->fd_code}}">
            <label for="Pcode" class="lable-size">Product Code</label>
        </div>
        <div class="form-floating my-2 my-sm-0">
            <input type="text" class="form-control" id="Pcode" placeholder="Product Code" name="Pcode" value="{{$key->fd_code}}">
            <label for="Pcode" class="lable-size">Product Code</label>
        </div>
        <div class="form-floating my-2 my-sm-0">
            <input type="text" class="form-control" id="Pcode" placeholder="Product Code" name="Pcode" value="{{$key->fd_code}}">
            <label for="Pcode" class="lable-size">Product Code</label>
        </div>
        <div class="form-floating my-2 my-sm-0">
            <input type="text" class="form-control" id="Pcode" placeholder="Product Code" name="Pcode" value="{{$key->fd_code}}">
            <label for="Pcode" class="lable-size">Product Code</label>
        </div>

        @endforeach
    </div>

</div>

<?php 
//easy way

function typeis($id)
{
    switch ($id) {
        case 100:
            return 'Snack';
            break;

        default:
            return 'No Founds';
            break;
    }
}

?>

<div id="modal_response_show">   
    <div id="modal_detail">
        @foreach ($data['Product'] as $key)
        
        <div class="form-floating my-2 my-sm-0">
            <input type="text" class="form-control" id="Pname" placeholder="Product Name" name="Pname" value="{{$key->fd_name}}">
            <label for="Pname" class="lable-size">Product Name</label>
        </div>
        <div class="form-floating my-2 my-sm-0">
            <input type="text" class="form-control" id="Ptype" placeholder="Product Type" name="Ptype" value="{{
                typeis($key->fd_type)}}">
            <label for="Ptype" class="lable-size">Product Type</label>
        </div>
        <div class="form-floating my-2 my-sm-0">
            <input type="text" class="form-control" id="Pseller" placeholder="Product Seller" name="Pseller" value="{{$key->fd_lasted_seller}}">
            <label for="Pseller" class="lable-size">Product Seller</label>
        </div>
        <!-- hidden -->
        <div class="d-none">
            <input type="text" class="form-control" id="Pimportday" placeholder="Product Import" name="dateimport"
            value="{{$key->fd_updated_datetime}}">
            <input type="text" class="form-control" id="Pby" placeholder="Product Create By" name="by"
            value="{{$key->fd_lasted_by}}">
        </div>


        @endforeach
    </div>

</div>

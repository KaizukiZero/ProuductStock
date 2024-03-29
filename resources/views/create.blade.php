@extends('master')
@section('title', 'Creating Page')

@section('content')
<div class="main p-3 text-capitalize">
    <div class="fs-1">
        <span>Create / Import Product</span>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('creating') }}" method="post">
        @csrf
        <div class="my-3 p-3 border rounded">
            <div class="fs-3 mb-2">
                
                <div class="row align-items-center">
                    <div class="col-md-4">Product Data</div>
                    <div class="col-md-4">
                        <div class="form-floating my- my-sm-0">
                            <select class="form-select lable-size" id="action" name="action">
                                <option value="" selected>Select Action</option>
                                <option value="Create">Create</option>
                                <option value="Import">Import</option>
                            </select>
                            <label for="action" class="lable-size">Action</label>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="row align-items-center">
                <div class="col-sm-4 col-12">
                    <div class="form-floating my-2 my-sm-0">
                        <input type="text" class="form-control" id="Pcode" placeholder="Product Code" name="code" value="">
                        <label for="PCode" class="lable-size">Product Code</label>
                    </div>
                </div>
                <div class="col-sm-4 col-12">
                    <div class="form-floating my-2 my-sm-0">
                        <input type="text" class="form-control" id="Pname" placeholder="Product Name" name="name" value="">
                        <label for="PName" class="lable-size">Product Name</label>
                    </div>
                </div>
                <div class="col-sm-4 col-12">
                    <div class="form-floating my-2 my-sm-0">
                        <input type="text" class="form-control" id="Pprice" placeholder="Product price" name="price" value="">
                        <label for="Pprice" class="lable-size">Product price : Pack or Box</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating my-2 my-sm-2">
                        <input type="date" class="form-control" id="Pexp" placeholder="Product EXP" name="exp"
                            value="{{date('Y-m-d')}}">
                        <label for="Pexp" class="lable-size">Product EXP</label>
                    </div>
                </div>

                <div class="col-sm-6 col-12">
                    <div class="form-floating my-2 my-sm-0">
                        <select class="form-select lable-size" id="Ptype" name="type">
                            <option value="" selected>Choose Product Type</option>
                            <option value="100">Snack</option>
                            <option value="200">Drink</option>
                            <option value="300">Milk</option>
                            <option value="400">Sauce</option>
                            <option value="500">Consumables</option>
                            <option value="600">Noodles</option>
                            <option value="999">Other</option>
                        </select>
                        <label for="Ptype" class="lable-size">Product type</label>
                    </div>

                </div>

                <div class="col-sm-6 col-12">
                    <div class="form-floating my-2 my-sm-0">
                        <input type="number" class="form-control" id="Pamount" placeholder="Product Amount" name="amount">
                        <label for="Pamount" class="lable-size">Product Amount : Box</label>
                    </div>
                </div>
            </div>


        </div>

        <div class="my-3 p-3 border rounded">
            <div class="fs-3 mb-2">Contact Seller</div>
        <div class="row align-items-center ">

            <div class="col-sm-4 col-12">
                <div class="form-floating my-2 my-sm-0">
                    <input type="text" class="form-control" id="PSeller" placeholder="Product Seller" name="SellerName" value="">
                    <label for="PSeller" class="lable-size">Seller / Company Name</label>
                </div>
            </div>
            <div class="col-sm-4 col-12">
                <div class="form-floating my-2 my-sm-0">
                    <select class="form-select lable-size" id="PtySeller" name="SellerType">
                        <option value="" selected>What is Sold</option>
                        <option value="100">Snack</option>
                        <option value="200">Drink</option>
                        <option value="300">Milk</option>
                        <option value="400">Sauce</option>
                        <option value="500">Consumables</option>
                        <option value="600">Noodles</option>
                        <option value="999">Other</option>
                    </select>
                    <label for="PtySeller" class="lable-size">Seller / Company Sold</label>
                </div>
            </div>
            <div class="col-sm-4 col-12">
                <div class="form-floating my-2 my-sm-0">
                    <input type="text" class="form-control" id="PhSeller" placeholder="Seller Phone" name="SellerPhone" value="">
                    <label for="PhSeller" class="lable-size">Seller / Company Phone</label>
                </div>
            </div>
        </div>
        </div>
        <!-- Hidden -->
        <div class="d-none">
            <input type="text" class="form-control" id="Pimportday" placeholder="Product Import" name="dateimport"
                        value="{{date('Y-m-d H:i:s')}}">
            <input type="text" class="form-control" id="Pby" placeholder="Product Create By" name="by"
                        value="Zero">
        </div>
        <button type="submit" class="btn btn-primary">Comfirm</button>
        <div type="buttom" class="btn btn-danger" id="Clear">Clear</div>
    </form>
    
</div>
@endsection

@section('scr')
<script>

    $('#Clear').click(function (e) {
        var default_now = formatDate(new Date());
        $('#Pcode').val('');
        $('#Ptype').prop('selectedIndex', 0);
        $('#Pamount').val('')
        $('#Pname').val('')
        $('#Pprice').val('')
        $('#Pexp').val(default_today)
        $('#PSeller').val('')
        $('#PtySeller').prop('selectedIndex', 0);
        $('#PhSeller').val('')
        $('#Pimportday').val(default_now)
    })

</script>
@endsection

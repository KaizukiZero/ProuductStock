@extends('master')
@section('title', 'Creating Page')

@section('content')
<div class="main p-3 text-capitalize">
    <div class="fs-1">
        <span>create product items</span>
    </div>
    <form action="" method="post">
        <div class="my-3 p-3 border rounded">
            <div class="row">
            <label class="form-label">Product List Import</label>
                <div class="col-sm-4 col-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="PCode" placeholder="Product Code" value="">
                        <label for="PCode" class="lable-size">Product Code</label>
                    </div>
                </div>
                <div class="col-sm-4 col-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="PName" placeholder="Product Name" value="">
                        <label for="PName" class="lable-size">Product Name</label>
                    </div>
                </div>
                <div class="col-sm-4 col-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="Pprice" placeholder="Product price" value="">
                        <label for="Pprice" class="lable-size">Product price : Pack or Box</label>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="Pmfg" placeholder="Product MFG"
                            value="{{date('Y-m-d')}}">
                        <label for="Pmfg" class="lable-size">Product MFG</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">

                        <input type="date" class="form-control" id="Pexp" placeholder="Product EXP"
                            value="{{date('Y-m-d')}}">
                        <label for="Pexp" class="lable-size">Product EXP</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-12">
                    <select class="form-select my-3 lable-size" id="Ptype">
                        <option value="000" selected>Choose Product Type</option>
                        <option value="100">Snack</option>
                        <option value="200">Drink</option>
                        <option value="300">Milk</option>
                        <option value="400">Sauce</option>
                        <option value="500">Consumables</option>
                        <option value="600">Noodles</option>
                        <option value="999">Other</option>
                    </select>
                </div>

                <div class="col-sm-6 col-12">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="Pamount" placeholder="Product Amount">
                        <label for="Pamount" class="lable-size">Product Amount : box</label>
                    </div>
                </div>

            </div>

        </div>

        <div class="my-3 p-3 border rounded">
        <div class="row">

            <label class="form-label">Contact Saler</label>

            <div class="col-sm-4 col-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="PSaler" placeholder="Product Saler" value="">
                    <label for="PSaler" class="lable-size">Product Saler / Company</label>
                </div>
            </div>
            <div class="col-sm-4 col-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="PhSaler" placeholder="Saler Phone" value="">
                    <label for="PhSaler" class="lable-size">Phone Saler / Company</label>
                </div>
            </div>
        </div>
        </div>

        <div class="row d-none">
            <div class="col-sm-6 col-12">
                <div class="form-floating mb-3">

                    <input type="text" class="form-control" id="Pimportday" placeholder="Product Import"
                        value="{{date('Y-m-d H:i:s')}}" disabled>
                    <label for="Pimportday" class="lable-size">Product Import</label>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="form-floating mb-3">

                    <input type="text" class="form-control" id="Pby" placeholder="Product Create By" disabled
                        value="Zero">
                    <label for="Pby" class="lable-size">Product Create By</label>
                </div>
            </div>
        </div>
        <div type="submit" name="submit" class="btn btn-primary" id="Comfirm">Comfirm</div>
        <div type="buttom" name="submit" class="btn btn-danger" id="Clear">Clear</div>
    </form>
</div>
@endsection

@section('scr')
<script>
    var pimportday = $('#Pimportday').val()
    var dateimport = Date.parse(pimportday)

    $('#Comfirm').click(function (e) {
        var pcode = $('#PCode').val();
        var ptype = $('#Ptype :selected').val()
        var pamount = $('#Pamount').val()
        var pby = $('#Pby').val()
        var pname = $('#PName').val()
        var psaler = $('#PSaler').val()
        var pmfg = $('#Pmfg').val()
        var pexp = $('#Pexp').val()

        var pid = ptype + pcode + dateimport
        console.log(pid)

    })

</script>
@endsection

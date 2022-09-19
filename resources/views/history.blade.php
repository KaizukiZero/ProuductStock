@extends('master')
@section('title', 'History Page')
<?php 
//easy way
$x = 1;
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
function byis($id)
{
    switch ($id) {
        case 1:
            return 'Create';
            break;
        case 2:
            return 'Import';
            break;
        default:
            return 'No Founds';
            break;
    }
}
// $result = [''];
?>
@section('content')
    <div class="main p-3 text-capitalize">
        <div class="fs-1">
            <span>Table History Products</span>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
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

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>PID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Price</th>
                        <th>Seller</th>
                        <th>Added</th>
                        <th>Product By</th>
                        <th>Expired Day</th>
                        <th>Created Day</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($check == 0)
                        <tr>
                            <td colspan="10">{{ 'No Data' }}</td>
                        </tr>
                    @endif
                    @foreach ($result as $key)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $key->fd_name }}</td>
                            <td>{{ typeis($key->fd_type) }}</td>
                            <td>{{ $key->fd_amount }}</td>
                            <td>{{ $key->fd_price }}</td>
                            <td>{{ $key->fd_seller_name }}</td>
                            <td>{{ $key->fd_by }}</td>
                            <td>{{ byis($key->fd_action) }}</td>
                            <td>{{ $key->fd_expired_datetime }}</td>
                            <td>{{ $key->fd_created_datetime }}</td>
                        </tr>
                        <?php $x++; ?>
                    @endforeach
                </tbody>
            </table>
            @if ($check == 0)
                {{ $result->onEachSide(0)->links() }}
            @endif
        </div>
    </div>
@endsection

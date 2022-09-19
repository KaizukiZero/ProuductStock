@extends('master')
@section('title', 'List Store Page')
<?php $x = 1;
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
@section('content')
    <div class="main p-3 text-capitalize">
        <div class="fs-1">
            <span>Table List Product Items</span>
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
        <a href="product/001" class="btn btn-group" target="_blank">Test</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>PID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Price</th>
                        <th>Import Lasted</th>
                        <th>Action</th>
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
                            <td>{{ typeis($key->fd_type) }} </td>
                            <td>{{ $key->fd_amount }}</td>
                            <td>{{ $key->fd_price }}</td>
                            <td>{{ $key->fd_created_datetime }}</td>
                            <td>
                                <form action="{{ route('deleteproduct', $key->fd_id) }}" method="POST">
                                    <button id="TEST" type="button" class="btn btn-primary" data-bs-toggle="modal" 
                                    data-bs-code="{{$key->fd_code}}"
                                        data-bs-target="#mainModal">Show</button>
                                    {{-- <a class="btn btn-info" href="{{ route('showitem', $key->fd_id) }}">Show</a> --}}
                                    {{-- <a class="btn btn-primary" href="{{ route('editing', $key->fd_id) }}">Edit</a> --}}
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php $x++; ?>
                    @endforeach
            </table>
            @if ($check == 0)
                {{ $result->onEachSide(0)->links() }}
            @endif

        </div>

    @endsection

@extends('master')
@section('title', 'List Store Page')
<?php $x = 1; 
function typeis($id){
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
                    
                    @foreach ($result as $key)
                        @if ($key->fd_id == '')
                            <tr>
                                <td colspan="8">{{ 'No Data' }}</td>
                            </tr>
                        @break;
                    @endif
                    <tr>
                        <td>{{ $x }}</td>
                        <td>{{ $key->fd_name }}</td>
                        <td>{{ typeis($key->fd_type); }} </td>
                        <td>{{ $key->fd_amount }}</td>
                        <td>{{ $key->fd_price }}</td>
                        <td>{{ $key->fd_created_datetime }}</td>
                        <td>
                            <form action="{{ route('deleteproduct', $key->fd_id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('showitem', $key->fd_id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('editing', $key->fd_id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php $x++; ?>
                @endforeach
        </table>
        {{ $result->onEachSide(0)->links() }}
    </div>
</div>
@endsection

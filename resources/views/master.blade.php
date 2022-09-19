<?php 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

</head>

<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('menu')
            <div class="col py-3">
                <div class="row">
                    <div class="col-md-2 col-md-offset-6 text-right">
                        <strong>Select Language: </strong>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control changeLang">
                            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English
                            </option>
                            <option value="th" {{ session()->get('locale') == 'th' ? 'selected' : '' }}>Thailand
                            </option>
                        </select>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>

    </div>
        <!-- Modal -->
        <div class="modal fade" id="mainModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">title clear</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    modal clean
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="{{ mix('/js/app.js') }}"></script>
<script type="text/javascript">
    var default_today = "{{ date('Y-m-d') }}";
    var url = "{{ route('changeLang') }}";

    $(".changeLang").change(function() {
        window.location.href = url + "?lang=" + $(this).val();
    });

    function padTo2Digits(num) {
        return num.toString().padStart(2, '0');
    }

    function formatDate(date) {
        return (
            [
                date.getFullYear(),
                padTo2Digits(date.getMonth() + 1),
                padTo2Digits(date.getDate()),
            ].join('-') +
            ' ' + [
                padTo2Digits(date.getHours()),
                padTo2Digits(date.getMinutes()),
                padTo2Digits(date.getSeconds()),
            ].join(':')
        );
    }
</script>

@yield('scr')

</html>

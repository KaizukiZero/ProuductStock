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

    <div class="container-fluid" >
        <div class="row flex-nowrap">
            @include('menu')
            <div class="col py-3">
                <div class="row">
                    <div class="col-md-2 col-md-offset-6 text-right">
                        <strong>Select Language: </strong>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control changeLang">
                            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                            <option value="th" {{ session()->get('locale') == 'th' ? 'selected' : '' }}>Thailand</option>
                        </select>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </div>


</body>
<script src="{{ mix('/js/app.js') }}"></script>
<script type="text/javascript">
  
    var url = "{{ route('changeLang') }}";
  
    $(".changeLang").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });
  
</script>

    @yield('scr')
</html>

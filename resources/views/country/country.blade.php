<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Dropdown</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .dropdown-container {
            margin-top: 50px;
        }
        .img-flag {
            margin-right: 10px;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            display: flex;
            align-items: center;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered img {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container text-center dropdown-container">
        <h1 class="mb-4">Select Your Country</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('store.trainer') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="trainer_name" id="trainer_name" placeholder="trainer name">
            <!-- <label for="country" class="btn btn-primary">Select Your Country</label> -->
            <select name="country_name" id="country" class="form-control">
                @foreach ($countries as $country)
                    <option value="{{ $country->country_name }}" data-flag="{{ $country->flag }}">
                        {{ $country->country_name }}
                    </option>
                @endforeach
            </select>
            <input type="hidden" name="flag" id="flag">
            <br><br>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>


    @foreach($trainers as $trainer)
    <h2>{{$trainer->trainer_name}}</h2>
    <h2>{{$trainer->country_name}}</h2>
    <h2>{{$trainer->flag}}</h2>



    @endforeach

    <!-- jQuery and Select2 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            function formatCountry(country) {
                if (!country.id) {
                    return country.text;
                }
                var $country = $(
                    '<span><img src="' + $(country.element).data('flag') + '" class="img-flag" width="20" /> ' + country.text + '</span>'
                );
                return $country;
            }

            $('#country').select2({
                templateResult: formatCountry,
                templateSelection: formatCountry,
                width: '100%'
            });

            $('#country').on('change', function() {
                var selectedFlag = $(this).find(':selected').data('flag');
                $('#flag').val(selectedFlag);
            });
        });
    </script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

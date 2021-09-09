<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/bootstrap-theme.min.css") }}">
    <!-- Font Awesome -->
    <link href="{{ asset("css/dataTables.bootstrap.min.css") }}" rel="stylesheet">
    <script type="text/javascript">
        print();
    </script>
</head>
<body>


<center>
    <h2>Inventaire de la pharmacie</h2>
    <h3>du</h3>
    <h3>{{ date('d-m-Y') }}</h3>
</center>

<br />
<div class="table-responsive">
        <table id="myTable-stock" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th><center>Nom Médoc</center></th>
                    <th><center>Prix</center></th>
                    <th><center>Qty</center></th>
                </tr>
            </thead>
            <tbody>
                @foreach($stocks as $s)
                <tr align="center">
                    <td>{{ $s->nom }}</td>
                    <td>{{ $s->prix }}</td>
                    <td>{{ $s->quantite }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
</div>



<script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-1.12.3.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-sales').DataTable();
    });
</script>

    <script type="text/javascript">
        print();
    </script>
</body>
</html>

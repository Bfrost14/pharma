@extends('layouts.app')

@section('content')

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
        </h1>
    </div>
</div>
<!-- /.row -->
<a href="{{ route("stocks.create") }}"><button class="btn btn-default">Nouveau Stock
    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
</button></a>



<div id="all-stocklist">
    <div class="table-responsive">
        <table id="myTable-stocklist" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th><center></center></th>
                    <th>Code Medoc</th>
                    <th>Nom Medoc</th>
                    <th>Type</th>
                    <th><center>Fabriquer</center></th>
                    <th><center>Acheter</center></th>
                    <th><center>Prix</center></th>
                    <th><center>Qty</center></th>
                    <th>Date d'exp</th>
                </tr>
            </thead>
            <tbody>

                @foreach($stocks as $sl)

                    <tr  align="center" class="text-success">
                        <td><input type="checkbox" name="stock" value="{{ $sl->id }}"></td>
                        <td align="left">{{ $sl->cod_Medoc }}</td>
                        <td align="left">{{ $sl->nom }}</td>
                        <td align="left">{{ $sl->description }}</td>
                        <td>{{ $sl->manufactured }}</td>
                        <td>{{ $sl->purchased }}</td>
                        <td>{{ $sl->prix }}</td>
                        <td>{{ $sl->quantite }}</td>
                        <td align="left" width="110px;">{{ $sl->expiration }}
                            <?php if($sl->expiration <= date("Y-m-d")): ?>
                                <span class="label label-danger">!</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>


<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<!-- for the datatable of employee -->
<script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-1.12.3.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-stocklist').DataTable();
    });
</script>


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
        </h1>
    </div>
</div>
<!-- /.row -->
<a href="/prints"><button class="btn btn-success btn-sm">PRINT
    <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
</button></a>
<div id="all-stock">
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


<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<!-- for the datatable of employee -->
<script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-1.12.3.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-stock').DataTable();
    });
</script>
</div>

@endsection

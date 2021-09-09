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
<strong>Ventes Journalier:</strong>
<input id="dailyDate" type="date" class="btn btn-default btn-sm" placeholder=""
value="<?= date('Y-m-d'); ?>">

<div  class="pull-right">
<a href="/print"><button type="button" class="btn btn-success btn-sm">
    PRINT
    <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
</button></a>
</div>

<div id="all-sales">
    <div class="table-responsive">
        <table id="myTable-sales" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Code Médox</th>
                    <th>Nom Medoc</th>
                    <th>Marque</th>
                    <th><center>Taux</center></th>
                    <th><center>Type</center></th>
                    <th><center>Prix</center></th>
                    <th><center>Qty</center></th>
                    <th><center>Somme Total</center></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $total = 0;
                $subTotal=0;
                foreach($ventes as $ds){
                $subTotal =$ds["price"] * $ds['quantite'] ;
                $total += $subTotal;
                }
            ?>

             @foreach($ventes as $ds)
                <tr>
                    <td>{{ $ds->code }}</td>
                    <td>{{ $ds->nom }}</td>
                    <td>{{ $ds->marque }}</td>
                    <td>{{ $ds->taux }}</td>
                    <td>{{ $ds->type }}</td>
                    <td align="center">{{ $ds->price }}</td>
                    <td align="center">{{ $ds->quantite }}</td>
                    <td align="center">{{ $ds->price * $ds->quantite }}</td>
                </tr>
                @endforeach
            </tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right"><strong>TOTAL:</strong></td>
                <td align="center">
                    <strong><?= number_format($total,2); ?></strong>
                </td>
            </tr>
        </table>
</div>


<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<!-- for the datatable of employee -->
<script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-1.12.3.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-sales').DataTable();
    });
</script>
</div>
@endsection

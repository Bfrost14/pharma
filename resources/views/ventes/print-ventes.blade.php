<!DOCTYPE html>
<html>
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
    <h1>Report de Ventes Journaliers</h1>
    <h2>du</h2>
    <h3>{{ date("d-m-Y") }}</h3>
 </center>
<br />
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
                    <td align="center">{{ $subTotal }}</td>
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


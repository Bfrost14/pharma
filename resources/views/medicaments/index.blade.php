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
<a href="{{ route("medicaments.create") }}"><button class="btn btn-default">Ajout nouveau Medicaments
    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
</button></a>
<div id="all-item">
    <div class="table-responsive">
        <table id="myTable-item" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Code Medoc</th>
                    <th>Nom</th>
                    <th>Marque</th>
                    <th>Type</th>
                    <th><center>taux</center></th>
                    <th><center>Prix</center></th>
                    <th>
                        <center>Action</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($medicaments as $it)
                    <tr align="center">
                        <td align="left">{{ $it->cod_Medoc }}</td>
                        <td align="left">{{ $it->nom }}</td>
                        <td align="left">{{ $it->marque }}</td>
                        <td align="left">{{ $it->description }}</td>
                        <td>{{ $it->dosage }}</td>
                        <td>{{ $it->prix }}</td>
                        <td>
                           <center>
                               <a href="{{ route('medicaments.edit', $it->idd) }}"><button type="button" class="btn btn-warning btn-xs">Edit
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </button></a>
                           </center>
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
        $('#myTable-item').DataTable();
    });
</script>
</div>

@endsection

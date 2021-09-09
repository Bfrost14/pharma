@extends('layouts.app')

@section('content')
<link href="{{ asset("vendor/mdi-font/css/material-design-iconic-font.min.css") }}" rel="stylesheet" media="all">
    <link href="{{ asset("vendor/font-awesome-4.7/css/font-awesome.min.css") }}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset("vendor/select2/select2.min.css") }}" rel="stylesheet" media="all">
    <link href="{{ asset("vendor/datepicker/daterangepicker.css") }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset("css/main.css") }}" rel="stylesheet" media="all">
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Panier</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("cart.store") }}">
                        @csrf
                        <div class="form-row">
                            <div class="name">Medicaments</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="medicaments_id">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            @foreach($medicaments as $medicament)
                                                <option value="{{ $medicament->id }}">{{ $medicament->nom }}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Quantite</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="quantite_Carts">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Stocks</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="stock_id">
                                            <option disabled="disabled" selected="selected">Choose stock</option>
                                            @foreach($stocks as $stock)
                                                <option value="{{ $stock->id }}">{{ $stock->nom }}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div>
                            <button class="btn btn--radius-2 btn--green" type="submit">Sauvegarder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
         <!-- Jquery JS-->
         <script src="{{ asset("vendor/jquery/jquery.min.js") }}"></script>
         <!-- Vendor JS-->
         <script src="{{ asset("vendor/select2/select2.min.js") }}"></script>
         <script src="{{ asset("vendor/datepicker/moment.min.js") }}"></script>
         <script src="{{ asset("vendor/datepicker/daterangepicker.js") }}"></script>

         <!-- Main JS-->
         <script src="{{ asset("js/global.js") }}"></script>
@endsection

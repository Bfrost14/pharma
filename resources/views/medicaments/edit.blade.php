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
                    <h2 class="title">Editer {{ $medicament->nom }}</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('medicaments.update', $medicament->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-row m-b-55">
                            <div class="name">Medicaments</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="cod_Medoc" value="{{ $medicament->cod_Medoc }}">
                                            <label class="label--desc">Code Medicament</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="nom" value="{{ $medicament->nom }}">
                                            <label class="label--desc">Nom</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Prix</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="prix" value="{{ $medicament->prix }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Marque</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="marque" value="{{ $medicament->marque }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Taux</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="dosage" value="{{ $medicament->dosage }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">categories</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="categories_id">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            @foreach($categories as $categorie)
                                                <option value="{{ $categorie->id }}">{{ $categorie->description }}</option>
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

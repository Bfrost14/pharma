@extends('layouts.app')

@section('content')

  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Bienvenue <small>Administrateur</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-home"></i> Accueil
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div id="order">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    Medicaments</h3>
                </div>
                <div class="panel-body">
                    <!-- start item -->
                   <div class="table-responsive">
                            <table id="myTable-item-order" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th><center>Code Medoc</center></th>
                                        <th><center>Nom</center></th>
                                        <th><center>Marque</center></th>
                                        <th><center>Prix</center></th>
                                        <th><center>Type</center></th>
                                        <th><center>Qty</center></th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($stocks as $s)
                                    <tr align="center">
                                        <td>{{ $s->cod_Medoc }}</td>
                                        <td>{{ $s->nom }}</td>
                                        <td>{{ $s->marque }}</td>
                                        <td>{{ $s->prix }}</td>
                                        <td>{{ $s->description }}</td>
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
                            $('#myTable-item-order').DataTable();
                        });
                    </script>

                    <!-- end item -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <a href="{{ route("carts.create") }}"><button class="btn btn-default">Ajout Panier
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                </button></a>
                <div class="panel-heading">
                    <h3 class="panel-title">
                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                    Cart
                    </h3>
                </div>
                <div class="panel-body">
                    <!-- cart -->
                    <div class="table-responsive">
                            <table id="myTable-cart" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th><center>Nom Medoc</center></th>
                                        <th><center>Prix</center></th>
                                        <th><center>Qty</center></th>
                                        <th><center>Somme</center></th>
                                        <th><center></center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <div style="display: none;">{{ $total = 0 }}</div>
                                @foreach($carts as $c)
                                <div style="display: none;">

                                    {{ $price = $c->prix}}
                                    {{ $qty = $c->quantite_Carts }}
                                    {{ $subTotal = $price * $qty }}
                                    {{ $total += $subTotal }}
                                </div>

                                    <tr align="center">
                                        <td>{{ $c->nom }}</td>
                                        <td>{{ $c->prix }}</td>
                                        <td>{{ $c->quantite_Carts}}</td>
                                        <td>{{ $subTotal }}</td>

                                        <td>
                                        <button type="button" class="btn btn-danger btn-xs" onclick="delCart('{{ $c->stock_id }}','{{ $c->quantite_Carts }}','{{ $c->idd }}');">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td align="right"><strong>Total:</strong></td>
                                        <td align="center">
                                            <strong><?= number_format($total, 2); ?></strong>
                                        </td>
                                        <td>
                                            <?php if($total > 0): ?>
                                            @foreach ($carts as $c)
                                            <form action="{{ route('ventes.store') }}" method="post" id="form.{{ $c->idd}}">
                                                @csrf

                                                <input type="hidden" name="code" value="{{ $c->cod_Medoc }}">
                                                <input type="hidden" name="nom" value="{{ $c->nom }}">
                                                <input type="hidden" name="marque" value="{{ $c->marque }}">
                                                <input type="hidden" name="taux" value="{{ $c->dosage }}">
                                                <input type="hidden" name="type" value="{{ $c->description }}">
                                                <input type="hidden" name="quantite" value="{{ $c->quantite_Carts }}">
                                                <input type="hidden" name="price" value="{{ $c->prix }}">

                                        </form>
                                        @endforeach
                                        <button  type="button" class="btn btn-success btn-xs" id="submit"  onclick="confirm_cart()">
                                            Confirm
                                            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                            </button>

                                            <?php endif; ?>
                                        </td>
                                    </tr>
                            </table>
                    </div>
                    <script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
                    <script type="text/javascript" src="{{ asset('js/jquery-1.12.3.js') }}"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#myTable-cart').DataTable();
                        });

                        document.getElementById( 'submit' ).addEventListener( 'click', function () {
                         // check for and report errors here
                        for( var index = 0; index < document.forms.length; index++ ) {
                         document.forms[index].submit();
                        };
                            } );

                    </script>
                    <!-- cart -->
                </div>
            </div>
        </div>
    </div>

    <br /><br /><br /><br /><br /><br /><br /><br />
</div>
<div class="modal fade" id="modal-confirmation">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-danger">Etes vous sure?</h4>
			</div>
			<div class="modal-body">
				<div align="center">
						<strong class="text-danger">
							<div id="remove-stud-msg">
								<h1></h1>
							</div>
						</strong>
						<input type="hidden" id="confirm-type" value="null">
						<button id="confirm-yes" type="button" class="btn btn-default btn-lg del-expired" >Confirm
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
						</button>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="button" class="btn btn-default btn-lg" data-dismiss="modal" >Declined
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
						</button>
				</div>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
<script>
    function delCart(stock_id, qty, cart_id){
        confirm("Voulez vous vraiment supprimez cette vente ?");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        console.log(cart_id);
	$.ajax({
			url: "{{ route('cart.store') }}"+'/'+cart_id,
			type: 'DELETE',
			data: {
				stock_id:stock_id,
				cart_id:cart_id,
				qty:qty
			},
			success: function (data) {
				console.log(data);
				window.location.href = "/";
			},
			error: function(){
				eMsg('354');
			}
		});
}//end delCart
</script>
@endsection

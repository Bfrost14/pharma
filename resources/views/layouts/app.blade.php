<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pharamacie</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/bootstrap-theme.min.css") }}">

    <!-- Custom CSS -->
    <link href="{{ asset("css/sb-admin.css") }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset("css/plugins/morris.css") }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset("font-awesome/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css">

    <link href="{{ asset("css/dataTables.bootstrap.min.css") }}" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Pharmacie de la cité</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  Administrateur <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-power-off"></i>Deconnexion</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse bg">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></i>Accueil</a>
                    </li>
                    <li>
                        <a href="/medicaments"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>Medicaments</a>
                    </li>

                    <li>
                        <a href="/stocks"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Stocks</a>
                    </li>
                    <li>
                        <a href="/ventes"><span class="glyphicon glyphicon-record" aria-hidden="true"></span>Ventes</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                @yield('content')

            </div>

        </div>

    </div>
    <!-- /#wrapper -->

    <script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-1.12.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>

    <script>
        function confirm_cart(){
	$('#confirm-type').val('confirmCart');
	$('#modal-confirmation').modal('show');
}

$('#confirm-yes').click(function(event) {
	var choice = $('#confirm-type').val();
	if(choice == 'confirmCart'){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		$.ajax({
				url: "{{ route('ventes.store') }}",
				type: 'post',
				dataType: 'json',
				data:{
					click:'yes'
				},
				success: function (data) {
					// console.log(data);
					if(data.valid == true){
						$('#confirm-type').val(' ');
						$('#modal-confirmation').modal('hide');
						showOrder();
						$('#modal-message').find('#msg-body').text(data.msg);
						$('#modal-message').modal('show');
					}
				},
				error: function(){
					eMsg(445);
				}
		});
	}
});
</script>

</body>

</html>

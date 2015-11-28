@extends('template')
<style type="text/css">

    #divCenter {
        width: 800px;
        height: 300px;
        margin-left: -400px; /* metade da largura */
        margin-top: -150px; /* metade da altura */
        position: absolute;
        top: 50%;
        left: 50%;
    }

    .caixa_out {
        position: absolute;
        width: 100%;
        height: 100%;

    }

    .caixa_in {
        position: absolute;
        top: 50%;
        left: 15%;
        width: 60%;
        text-align: center;
        -webkit-transform: translateY( -50% );
        -moz-transform: translateY( -50% );
        transform: translateY( -50% );
    }

</style>

@section('content')

	<div class="container-fluid caixa_out" >
	<div class="row caixa_in">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Opa!</strong> Você digitou alguma coisa errada.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Senha</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Lembre-me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Logar</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">Esqueceu sua senha?</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
@endsection

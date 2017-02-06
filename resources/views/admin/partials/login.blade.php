@extends("admin.partials.header")
@section("header")
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Login</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/login') }}">
                {!! csrf_field() !!}
                <div class="text-center">
                    @if(!empty($error))
                            <strong style="color:red;">Login sau parola gresita</strong>
                    @endif
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Adresa Email</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                        <a class="btn btn-link" href="{{ url('/admin/reset') }}">Am uitat parola?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

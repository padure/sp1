@extends("admin.partials.header")
@section("header")
@if(empty($corect))
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Resetare parola</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/reset') }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="col-md-4 control-label">Adresa Email</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @if (!empty($error) && count($error) >0)
                                <span class="help-block">
                                    <strong class="text-danger">Nu exista asa email in baza de date</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Trimite
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@else
    @if(empty($newpass))
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Introduceti codul</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/setcode') }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Introduceti codul</label>
                            <div class="col-md-6">
                                <input type="hidden" name="email" value="{{$corect}}">
                                <input type="text" class="form-control" name="code">
                                @if (!empty($codeeror) && count($codeeror) >0)
                                    <span class="help-block">
                                        <strong class="text-danger">Codul este gresit</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Trimite
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Parola noua</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/newpass') }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Parola noua</label>
                            <div class="col-md-6">
                                <input type="hidden" name="email" value="{{$newpass}}">
                                <input type="text" class="form-control" name="newpass">
                                @if (!empty($newpasseror) && count($newpasseror) >0)
                                    <span class="help-block">
                                        <strong class="text-danger">Parola 5-50 caractere</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Salveaza
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endif
@endsection
@extends("main.base")
@section("content")
<div class="col-md-12">
    <h3>Administrația</h3>
    <div class="col-md-12 administratia">
        @if(!empty($post) && count($post)>0)
            @foreach($post as $i)
                <div class="col-md-12 admin-info">
                    <div class="col-md-4 image">
                        <img src="{{ asset ( $i->photo ) }}" class="" />
                    </div>
                    <div class="col-md-8 description">
                        <table class="table table-striped">
                            <tr class="text-center" style="font-weight: bold;">
                                <td colspan="2">
                                    {{$i->anume}}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 200px;">
                                    <label>Functia:</label>
                                </td>
                                <td>{{$i->functia}}</td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Anul nasterii:</label>
                                </td>
                                <td>{{date('d-m-Y', strtotime($i->anulnasterii))}}</td></tr>
                            <tr>
                                <td>
                                    <label>Experienta:</label>
                                </td>
                                <td>{{$i->experienta}} ani</td></tr>
                            <tr>
                                <td>
                                    <label>Grad:</label>
                                </td>
                                <td>{{$i->grad}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection

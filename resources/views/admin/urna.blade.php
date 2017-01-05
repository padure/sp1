@extends("admin.base")
@section("content")
    <h3>Sa stergem fisierele nefolositoare de pe site!</h3>
    <p class="text-info">Fisierele nefolositoare sunt pozele care au fost incarcate si modificate cu alte poze , de aceia ele nu mai sunt folositoare pentru site si doar ocupa memorie!</p>
    @if(!empty($post["fisierenefolosite"]))
        <h1>Fisiere nefolosite: {{$post["fisierenefolosite"]}}</h1>
        <h1>Memorie folosita de fisiere nefolositoare {{$post["fisierenefolositoaresize"]}} Mb</h1>
        <a class="btn btn-danger" href="{{URL("admin/deleteurna")}}">
            <span class="glyphicon glyphicon-remove"></span>
            Sterge fisierele nefolositoare
        </a>
    @else
        <h1>Nu au fost gasite fisiere nefolosite</h1>
    @endif
@endsection
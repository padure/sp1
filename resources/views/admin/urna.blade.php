@extends("admin.base")
@section("content")
    <h3>Sa stergem fisierele nefolositoare de pe site!</h3>
    <p class="text-info">Fisierele nefolositoare sunt pozele pe care le incarcati si nu salvati evenimentul , ele doar ocupa memorie!</p>
    @if(!empty($post["fisierenefolosite"]))
        <h1>Fisiere nefolositoare: {{$post["fisierenefolosite"]}}</h1>
        <h1>Memorie folosita de fisiere nefolositoare {{$post["fisierenefolositoaresize"]}} Mb</h1>
        <a class="btn btn-danger" href="{{URL("admin/deleteurna")}}">
            <span class="glyphicon glyphicon-remove"></span>
            Sterge fisierele nefolositoare
        </a>
    @else
        <h1>Fisiere nefolositoare: 0</h1>
    @endif
@endsection
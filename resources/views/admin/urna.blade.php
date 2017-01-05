@extends("admin.base")
@section("content")
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Sa stergem fisierele nefolositoare de pe site!</h3>
    </div>
    <div class="panel-body">
        <p class="text-danger">Fisierele nefolositoare sunt pozele pe care le incarcati si nu salvati evenimentul , ele doar ocupa memorie!</p>
    </div>
    <div class="panel-footer">
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
        
    </div>
</div>
    
    
@endsection
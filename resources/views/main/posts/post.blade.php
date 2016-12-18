@extends("main.base")
@section("content")
    @if(!empty($posts))
        @foreach($posts as $i)
            <div class="col-md-12 main-post">
                <h3>{{$i->title}}
                    <span>
                        {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$i->created_at)->format('d/m/Y')}}
                    </span>
                </h3>
                <img src="{{ asset ( "images/studenti.jpg" ) }}" class="img-thumbnail">
                <p>Ca în fiecare an, prima zi de școală a fost întâmpinată cu emoții și mult entuziasm de către elevii celui mai
                   prestigios liceu din municipiul Alba Iulia, Colegiul Național ”Horea, Cloșca și Crișan”.Încă de la prima oră a
                   dimineții, sute de elevi, îmbrăcați frumos, unii cu buchete de flori în mână, s-au strâns în curtea liceului
                   pentru a participa la festivitatea de deschidere a noului an școlar. De departe, cei mai emoționați au fost bobocii,
                   care au intrat astăzi pentru prima dată pe porțile instituției, curioși să-și cunoască noii colegi, profesorii,
                   dar și liceul în care vor învă</p>
                <a href="{{URL("/post/".$i->id)}}"><button class="btn btn-info btn-sm">Citeste</button></a>
            </div>
        @endforeach
    @endif
@endsection
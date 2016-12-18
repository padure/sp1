@extends("main.base")
@section("content")
<div class="col-md-12 info-post">
    @if(!empty($post["name"][0]))
        <h3>
            {{$post["name"][0]->title}} 
            <span>
                {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$post["name"][0]->created_at)->format('d/m/Y')}}
            </span>
        </h3>
        <div class="col-md-4">
            <img src="{{ asset ( $post["name"][0]->image ) }}" class="img-thumbnail">
        </div>
        <div class="col-md-8 paragraf">
            @if(count($post["content"])>0)
                @foreach($post["content"] as $i)
                    <p>{{$i->text}}</p>
                @endforeach
            @endif
        </div>
        <div class="col-md-12 galerie">
            @if(count($post["others"])>0)
                @foreach($post["others"] as $i)
                    @if($i->type==2)
                        <p>{{$i->text}}</p>
                    @endif
                @endforeach
            @endif
        </div>
    @else
        <h1>Nu exista acest eveniment</h1>
    @endif

    <!--
   <h3>Prima zi de scoala <span>18/12/16</span></h3>
   <div class="col-md-4">
        <img src="{{ asset ( "images/studenti.jpg" ) }}" class="img-thumbnail">
   </div>
   <div class="col-md-8 paragraf">
    <p >Ca în fiecare an, prima zi de școală a fost întâmpinată cu emoții și mult entuziasm de către elevii celui mai
       prestigios liceu din municipiul Alba Iulia, Colegiul Național ”Horea, Cloșca și Crișan”.Încă de la prima oră a
       dimineții, sute de elevi, îmbrăcați frumos, unii cu buchete de flori în mână, s-au strâns în curtea liceului
       pentru a participa la festivitatea de deschidere a noului an școlar. De departe, cei mai emoționați au fost bobocii,
       care au intrat astăzi pentru prima dată pe porțile instituției, curioși să-și cunoască noii colegi, profesorii,
       dar și liceul în care vor învă</p>
    
    <p >Ca în fiecare an, prima zi de școală a fost întâmpinată cu emoții și mult entuziasm de către elevii celui mai
       prestigios liceu din municipiul Alba Iulia, Colegiul Național ”Horea, Cloșca și Crișan”.Încă de la prima oră a
       dimineții, sute de elevi, îmbrăcați frumos, unii cu buchete de flori în mână, s-au strâns în curtea liceului
       pentru a participa la festivitatea de deschidere a noului an școlar. De departe, cei mai emoționați au fost bobocii,
       care au intrat astăzi pentru prima dată pe porțile instituției, curioși să-și cunoască noii colegi, profesorii,
       dar și liceul în care vor învă</p>
    </div>
   <div class="col-md-12 galerie">
       <div class="col-md-4">
            <img src="{{ asset ( "images/studenti3.jpg" ) }}" class="img-thumbnail">
       </div>
       <div class="col-md-4">
            <img src="{{ asset ( "images/studenti2.jpg" ) }}" class="img-thumbnail">
       </div>
       <div class="col-md-4">
            <img src="{{ asset ( "images/studenti.jpg" ) }}" class="img-thumbnail">
       </div>
   </div>
    -->
</div>
@endsection
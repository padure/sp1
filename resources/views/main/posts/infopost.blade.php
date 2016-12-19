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
                    @if($i->type==3)
                        <p class="col-md-12">
                            <img src="{{asset($i->text)}}" class="img-responsive col-md-12"/>
                        </p>
                    @endif
                    @if($i->type==4)
                        <p class="col-md-6">
                            <img src="{{asset($i->text)}}" class="img-responsive"/>
                        </p>
                    @endif
                    @if($i->type==5)
                        <p class="col-md-4">
                            <img src="{{asset($i->text)}}" class="img-responsive"/>
                        </p>
                    @endif
                    @if($i->type==6 && $i->isimage==1)
                        <p class="col-md-6">
                            <img src="{{asset($i->text)}}" class="img-responsive"/>
                        </p>
                    @endif
                    @if($i->type==6 && $i->isimage==0)
                        <p class="col-md-6">{{$i->text}}</p>
                        <p class="clearfix"></p>
                    @endif
                    @if($i->type==7 && $i->isimage==0)
                        <p class="col-md-6">{{$i->text}}</p>
                    @endif
                    @if($i->type==7 && $i->isimage==1)
                        <p class="col-md-6">
                            <img src="{{asset($i->text)}}" class="img-responsive"/>
                        </p>
                        <p class="clearfix"></p>
                    @endif
                @endforeach
            @endif
        </div>
    @else
        <h1>Nu exista acest eveniment</h1>
    @endif
</div>
@endsection
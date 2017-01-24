@extends("main.base")
@section("content")
    @if(!empty($posts))
        @foreach($posts as $i)
            <div class="col-md-12 main-post" style="">
                <h3>{{$i->title}}
                    <span>
                        {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$i->created_at)->format('d/m/Y')}}
                    </span>
                </h3>
                <div class="col-md-10">
                <p>{{$i->text}}</p>
                <a href="{{URL("/post/".$i->id)}}"><button class="btn btn-info btn-sm" id="citeste">Citeste</button></a>
                </div>
                <div class="col-lg-2">
                    <img src="{{ asset ( $i->image ) }}" class="img-thumbnail"/>
                </div>
            </div>
        @endforeach
    @endif
@endsection
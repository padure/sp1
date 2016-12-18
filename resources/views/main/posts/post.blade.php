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
                <p>{{$i->text}}</p>
                <a href="{{URL("/post/".$i->id)}}"><button class="btn btn-info btn-sm">Citeste</button></a>
            </div>
        @endforeach
    @endif
@endsection
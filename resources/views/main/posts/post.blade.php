@extends("main.base")
@section("content")
    @if(!empty($posts))
        @foreach($posts as $i)
            <div class="col-md-12 main-post whiteclass">
                <div class="col-md-10">
                    <h2>
                        <a href="{{URL("/post/".$i['item']->id)}}">
                            {{$i['item']->title}}
                        </a>
                    </h2>
                    <div class="row col-md-12" style="padding-right: 0px;">
                        
                        @foreach($i['content'] as $j)
                            <p>{{$j}}</p>
                        @endforeach
                        <a href="{{URL("/post/".$i['item']->id)}}">
                            <button class="btn btn-info btn-sm" id="citeste">
                                Citeste
                            </button>
                        </a>
                        <p style="text-align: right; margin-top:15px; font-size:14px;">
                            <img src="{{asset('allimages/system/import/clock.png')}}" class="cias"/>
                            {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$i['item']->created_at)->format('d/m/Y')}}
                        </p>
                    </div>
                </div>
                <div class="col-md-2">
                    <img src="{{ asset ( $i['item']->image ) }}" class="img-thumbnail roteste"/>
                </div>
                
            </div>
        @endforeach
    @endif
@endsection
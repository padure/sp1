@extends("main.base")
@section("content")
<div class="col-md-12 whiteclass" style="padding-bottom: 20px;">
    <h3>
        @if($post["den"]==0)
            Parteneri educaționali
        @elseif($post["den"]==1)
            Parteneri naționali
        @else
            Parteneri internaționali
        @endif
    </h3>
    @if(!empty($post["parteneriate"]) && count($post["parteneriate"])>0)
        @foreach($post["parteneriate"] as $i)
            <div class="col-md-3 parteneri-all">
                <a href="{{$i->link}}" target="_blank">
                    <img src="{{ asset($i->image)}}">
                </a>
            </div>
        @endforeach
    @else
        <h1>Nu sunt parteneriati</h1>
    @endif
</div>
</div>
@endsection

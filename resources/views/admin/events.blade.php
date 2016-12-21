@extends("admin.base")
@section("content")
    <h1 class="text-center">Evenimente</h1>
    <p class="content text-right">
        <a class="btn btn-info" href="{{URL("/admin/newevent")}}">
            <span class="glyphicon glyphicon-plus"></span>
            Adauga eveniment
        </a>
    </p>
    @if(!empty($posts))
        <table class="table table-bordered tabeleadmin" id="tabel">
                <thead>
                    <tr>
                        <th class="titluid">ID:</th>
                        <th class="titluimagine">Image:</th>
                        <th>Titlu:</th>
                        <th>Creat:</th>
                        <th style="width:  220px;">Setari:</th>
                    </tr>
                </thead>
                @foreach($posts as $i)
                <tr id="{{$i->id}}">
                    <td>{{$i->id}}</td>
                    <td>
                        <img src="{{ asset($i->image) }}" class="img-responsive"/>
                    </td>
                    <td>
                        <a href="{{URL("/post/".$i->id)}}" target="_blank">
                            {{$i->title}}
                        </a>
                    </td>
                    <td>{{date('d/m/Y', strtotime($i->created_at))}}</td>
                    <td>
                        <a href="{{URL("/admin/modifica/".$i->id)}}" data-toggle="modal"> 
                            <span class="glyphicon glyphicon-cog"></span>
                            Modifica
                        </a>  
                        <a class="sterge" id="delete{{$i->id}}"> 
                            <span class="glyphicon glyphicon-minus"></span>
                            Sterge
                        </a>  
                    </td>
                </tr>
                @endforeach
            </table>
    @else
        <h1 class="text-center">Nu sunt evenimente</h1>
    @endif
@endsection
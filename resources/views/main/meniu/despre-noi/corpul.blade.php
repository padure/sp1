@extends("main.base")
@section("content")
    @if(!empty($post) && count($post)>0)
        <div style="padding: 10px">
            <h3>Corpul didactic</h3>
            <table class="table table-striped" >
                <tr>
                    <th>NR/Ord</th>
                    <th>Nume</th>
                    <th>Prenume</th>
                    <th>Functia</th>
                </tr>
                @for($i=0;$i< count($post);$i++)
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$post[$i]->nume}}</td>
                        <td>{{$post[$i]->prenume}}</td>
                        <td>{{$post[$i]->functia}}</td>
                    </tr>
                @endfor
            </table>
        </div>
    @endif
@endsection
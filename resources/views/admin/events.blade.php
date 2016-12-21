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
                <tr>
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
                        <a class="deleteevent" name="deleteevent" id="{{$i->id}}"> 
                            <span class="glyphicon glyphicon-remove"></span>
                            Sterge
                        </a>  
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="modal fade" id="comfirm_delete_event" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title text-center">Sterge eveniment</h4>
                    </div>
                    <div class="modal-body text-center">
                        <h2 class="calibri" style="margin: 0px 0px 15px 0px;">Sigur doriti sa stergeti acest eveniment?</h2>
                        <button class="btn btn-default" id="yesdelete">Da</button>
                        <button class="btn btn-primary" data-dismiss="modal">Nu</button>
                    </div>
                  </div>
                </div>
            </div>
    @else
        <h1 class="text-center">Nu sunt evenimente</h1>
    @endif
    <script>
        $(document).ready(function() {
            $("a[name=deleteevent]").on("click",function(){
                var id=$(this).attr("id");
                $("#comfirm_delete_event").modal();
                $("#yesdelete").attr("onclick","deleteevent("+id+")");
            });
        });
        function deleteevent(id){
            $.ajax({  
                type: 'POST',  
                url: "{{URL('/admin/deleteevent')}}", 
                data: 
                    {
                      id:id
                    },
                success: function() {
                    location.reload();
                }
            });
        }
    </script>
@endsection
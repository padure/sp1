@extends("admin.base")
@section("content")
    <form method="post" id="adaugare_corpdidactic" class="form-horizontal">
        <div class="form-group">
            <label class="col-md-4 control-label">Numele:</label>
            <div class="col-md-6">
                <input type="text" name="nume" class="form-control" id="nume">
                <strong id="nameeror" class="text-danger"></strong>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Prenumele:</label>
            <div class="col-md-6">
                <input type="text" name="prenume" class="form-control" id="prenume">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Functia:</label>
            <div class="col-md-6">
                <input type="text" name="functia" class="form-control" id="functia">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-default" name="addCorp" id="saveormod" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se adauga">
                    Salveaza
                </button>
            </div>
        </div>
    </form>

    <table id="toticorpdidactic" class="table">
        @if(!empty($post) && count($post)>0)
            <tr>
                <th>Nr</th>
                <th>Nume</th>
                <th>Prenume</th>
                <th>Functia</th>
                <th>Setari</th>
            </tr>
            @for($i=0;$i< count($post);$i++)
                <tr id='corp{{$post[$i]->id}}' nume='{{$post[$i]->nume}}' prenume='{{$post[$i]->prenume}}' functia='{{$post[$i]->functia}}'>
                    <td>{{$i+1}}</td>
                    <td>{{$post[$i]->nume}}</td>
                    <td>{{$post[$i]->prenume}}</td>
                    <td>{{$post[$i]->functia}}</td>
                    <td style='width:200px'>
                        <button class='btn btn-primary btn-xs' idcorp='{{$post[$i]->id}}' name='modificacorp'>Modifica</button>
                        <button class='btn btn-danger btn-xs' idcorp='{{$post[$i]->id}}' name='stergecorp'>Sterge</button>
                    </td>
                </tr>
            @endfor
        @endif
    </table>
    <div class="modal fade" id="comfirm_delete_corp" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center">Sterge elev</h4>
            </div>
            <div class="modal-body text-center">
                <h2 class="calibri" style="margin: 0px 0px 15px 0px;">Sigur doriti sa stergeti?</h2>
                <button class="btn btn-default" id="yesdelete">Da</button>
                <button class="btn btn-primary" data-dismiss="modal">Nu</button>
            </div>
          </div>
        </div>
    </div>
<script>
    function afiseaza(data){
        $("#toticorpdidactic").html("<tr><th>Nr</th><th>Nume</th><th>Prenume</th><th>Functia</th><th>Setari</th></tr>");
        for(var i=0;i<data.length;i++){
            $("#toticorpdidactic").append("<tr id='corp"+data[i].id+"' nume='"+data[i].nume+"' prenume='"+data[i].prenume+"' functia='"+data[i].functia+"'><td>"+(i+1)+"</td><td>"+data[i].nume+"</td><td>"+data[i].prenume+"</td><td>"+data[i].functia+"</td>\n\
                                    <td style='width:200px'>\n\
                                        <button class='btn btn-primary btn-xs' idcorp='"+data[i].id+"' name='modificacorp'>Modifica</button>\n\
                                        <button class='btn btn-danger btn-xs' idcorp='"+data[i].id+"' name='stergecorp'>Sterge</button>\n\
                                    </td></tr>");
        }
    }
    $('body').on("click","button[name=modificacorp]",function(){
        var id=$(this).attr("idcorp");
        var nume=$("#corp"+id).attr("nume");
        var prenume=$("#corp"+id).attr("prenume");
        var functia=$("#corp"+id).attr("functia");
        $("input[name=nume]").val(nume);
        $("input[name=nume]").focus();
        $("input[name=prenume]").val(prenume);
        $("input[name=functia]").val(functia);
        $("#saveormod").attr("name","modCorp");
        $("#saveormod").attr("idcorp",id);
    });
    $('body').on("click","button[name=stergecorp]",function(){
        var id=$(this).attr("idcorp");
        $("#yesdelete").attr("idcorp",id);
        $("#comfirm_delete_corp").modal();
    });
    $('#yesdelete').on("click",function(){
        var id=$(this).attr("idcorp");
        $.ajax({  
                type: 'POST',  
                url: "{{URL('/admin/delcorpdidactic')}}", 
                data: 
                    { 
                        id:id
                    },
                success: function(data) {
                    $("#comfirm_delete_corp").modal("hide");
                    $("#corp"+data).remove();
                }
            });
    });
    $('#adaugare_corpdidactic').submit(function(e) {
        e.preventDefault();
        var nume=$("input[name=nume]").val();
        var prenume=$("input[name=prenume]").val();
        var functia=$("input[name=functia]").val();
        $("input[name=nume]").css("border-color","#ccc");
        $("input[name=prenume]").css("border-color","#ccc");
        $("input[name=functia]").css("border-color","#ccc");
        var permit=true;
        if(functia.length===0 || functia.length>100){
            $("input[name=functia]").css("border-color","red");
            $("input[name=functia]").focus();
            permit=false;
        }
        if(prenume.length===0 || prenume.length>100){
            $("input[name=prenume]").css("border-color","red");
            $("input[name=prenume]").focus();
            permit=false;
        }
        if(nume.length===0 || nume.length>100){
            $("input[name=nume]").css("border-color","red");
            $("input[name=nume]").focus();
            permit=false;
        }
        if(permit===true){
            $("#saveormod").button("loading");
            if($("#saveormod").attr("name")==="addCorp"){
                $.ajax({  
                    type: 'POST',  
                    url: "{{URL('/admin/addcorpdidactic')}}", 
                    data: 
                        { 
                            nume:nume,
                            prenume:prenume,
                            functia:functia
                        },
                    success: function(data) {
                        $("input[name=nume]").val("");
                        $("input[name=nume]").focus();
                        $("input[name=prenume]").val("");
                        $("input[name=functia]").val("");
                        afiseaza(data);
                        $("#saveormod").button("reset");
                    }
                });
            }else{
                $.ajax({  
                    type: 'POST',  
                    url: "{{URL('/admin/modcorpdidactic')}}", 
                    data: 
                        { 
                            id:$("#saveormod").attr("idcorp"),
                            nume:nume,
                            prenume:prenume,
                            functia:functia
                        },
                    success: function(data) {
                        $("input[name=nume]").val("");
                        $("input[name=nume]").focus();
                        $("input[name=prenume]").val("");
                        $("input[name=functia]").val("");
                        $("#saveormod").attr("name","addCorp");
                        afiseaza(data);
                        $("#saveormod").button("reset");
                    }
                });
            }
        }
    });
</script>
@endsection
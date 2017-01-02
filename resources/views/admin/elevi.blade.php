@extends("admin.base")
@section("content")
    <style>
        .elevidesign{
            margin-bottom: 15px;
        }
        .labels{
            margin-right: 10px;
            cursor: pointer;
        }
        #loader{
            width: 150px;
            margin:0 auto;
            display:none;
        }
    </style>

    <div class="col-md-12 elevidesign">
        <div id="totiani" class="col-md-10">
            @if(!empty($post["ani"]))
                @foreach($post["ani"] as $i)
                    <label for="an{{$i->id}}" class="labels">
                        <input type="radio" id="an{{$i->id}}" 
                               value="{{$i->id}}"
                               name="radio_an"/>
                        <span>{{$i->an}}</span>
                    </label>
                @endforeach
            @endif
        </div>
        <div class="col-md-2">
            <button class="btn btn-info btn-block" name="addAn">Adauga an</button>
        </div>
    </div>
    
    <div class="col-md-12 elevidesign" style="border-top:1px solid gray; padding-top:15px;">
        <div id="toategrupele" class="col-md-10">
            @if(!empty($post["grupe"]))
                @foreach($post["grupe"] as $i)
                    <label for="grupa{{$i->id}}" class="labels" name="{{$i->id_an}}" ascunde="ascunde" style="display:none;">
                        <input type="radio" id="grupa{{$i->id}}" 
                               value="{{$i->id}}"
                               name="radio_grupa"/>
                        <span>{{$i->nume_grupa}}</span>
                    </label>
                @endforeach
            @endif
        </div>
        <div class="col-md-2">
            <button class="btn btn-info btn-block" name="addGrupa" disabled>Adauga grupa</button>
        </div>
    </div>
    <div class="col-md-12 elevidesign">
        <form method="post" id="adaugare_elev" class="form-inline">
            <div class="form-group">
                <label for="nume">Nume:</label>
                <input type="text" name="nume" class="form-control" id="nume">
            </div>
            <div class="form-group">
                <label for="prenume">Prenume:</label>
                <input type="text" name="prenume" class="form-control" id="prenume">
            </div>
            <button type="submit" class="btn btn-default" name="addElev" id="saveormod" disabled data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se adauga">
                Salveaza
            </button>
        </form>
    </div>
    
    <div class="col-md-12 elevidesign">
        <div id="loader">
            <img src="{{asset("allimages/system/loader.gif")}}" class="img-responsive"/>
        </div>
        <table class="table" id="totielevii">
        </table>
    </div>
    <div class="modal fade" id="add_an" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center">Adauga Anul!</h4>
            </div>
            <div class="modal-body text-center">
                <input type="text" class="form-control" name="input_add_an" placeholder="An"/><br>
                <button class="btn btn-primary" name="save_add_an" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se salveaza">Salveaza</button>
                <button class="btn btn-default" data-dismiss="modal">Anuleaza</button>
            </div>
          </div>
        </div>
    </div>
    
    <div class="modal fade" id="add_grupa" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center">Adauga Grupa!</h4>
            </div>
            <div class="modal-body text-center">
                <input type="text" class="form-control" name="input_add_grupa" placeholder="Grupa"/><br>
                <button class="btn btn-primary" name="save_add_grupa" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se salveaza">Salveaza</button>
                <button class="btn btn-default" data-dismiss="modal">Anuleaza</button>
            </div>
          </div>
        </div>
    </div>
    
    <div class="modal fade" id="comfirm_delete_elev" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center">Sterge admin</h4>
            </div>
            <div class="modal-body text-center">
                <h2 class="calibri" style="margin: 0px 0px 15px 0px;">Sigur doriti sa stergeti acest elev?</h2>
                <button class="btn btn-default" id="yesdelete">Da</button>
                <button class="btn btn-primary" data-dismiss="modal">Nu</button>
            </div>
          </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("button[name=addAn]").on("click",function(){
                $("#add_an").modal();
            });
            $("button[name=addGrupa]").on("click",function(){
                $("#add_grupa").modal();
            });
            function afiseaza(data){
                $("#totielevii").html("<tr><th>Nr</th><th>Nume</th><th>Prenume</th><th>Setari</th></tr>");
                for(var i=0;i<data.length;i++){
                    $("#totielevii").append("<tr id='elev"+data[i].id+"' nume='"+data[i].nume+"' prenume='"+data[i].prenume+"'><td>"+(i+1)+"</td><td>"+data[i].nume+"</td><td>"+data[i].prenume+"</td>\n\
                                            <td style='width:200px'>\n\
                                                <button class='btn btn-primary' idelev='"+data[i].id+"' name='modificaelev'>Modifica</button>\n\
                                                <button class='btn btn-danger' idelev='"+data[i].id+"' name='stergeelev'>Sterge</button>\n\
                                            </td></tr>");
                }
            }
            $("body").on("click","button[name=modificaelev]",function(){
                var id=$(this).attr("idelev");
                var info=$("#elev"+id);
                var nume=info.attr("nume");
                var prenume=info.attr("prenume");
                $("input[name=nume]").val(nume);
                $("input[name=nume]").focus();
                $("input[name=prenume]").val(prenume);
                $("#saveormod").attr("name","modElev");
                $("#saveormod").attr("idmod",id);
            });
            $("body").on("click","button[name=stergeelev]",function(){
                var id=$(this).attr("idelev");
                $("#comfirm_delete_elev").modal();
                $("#yesdelete").attr("idsters",id);
            });
            $("body").on("click","#yesdelete",function(){
                var id=$("#yesdelete").attr("idsters");
                $.ajax({  
                    type: 'POST',  
                    url: "{{URL('/admin/stergeelev')}}", 
                    data: 
                        { 
                            id:id
                        },
                    success: function(data) {
                        afiseaza(data);
                        $("#comfirm_delete_elev").modal("hide");
                    }
                });
            });
            /*Afisam buttonul salveaza daca sunt selectate anul si grupa*/
            $("body").on("change","input[name=radio_grupa]",function(){
                $("#saveormod").prop("disabled",false);
                $("#totielevii").html("");
                $("#loader").show();
                var grupa=$(this).val();
                $.ajax({  
                    type: 'POST',  
                    url: "{{URL('/admin/getelevi')}}", 
                    data: 
                        { 
                            grupa:grupa
                        },
                    success: function(data) {
                        afiseaza(data);
                        $("#loader").hide();
                    }
                });
            });
            /*Afisam grupele in dependenta de ce an a fost ales*/
            $("body").on("change","input[name=radio_an]",function(){
                $("#totielevii").html("");
                $("button[name=addGrupa]").prop("disabled",false);
                $("#saveormod").prop("disabled",true);
                var id=$(this).attr("value");
                $("input[name=radio_grupa]").prop('checked', false);
                $("label[ascunde=ascunde]").hide();
                $("label[name="+id+"]").show();
            });
            /*Salvam elevii*/
            $('#adaugare_elev').submit(function(e) {
                e.preventDefault();
                var nume=$("input[name=nume]").val();
                var prenume=$("input[name=prenume]").val();
                var id_grupa=$("input[name=radio_grupa]:checked").val();
                $("input[name=nume]").css("border-color","#ccc");
                $("input[name=prenume]").css("border-color","#ccc");
                var permit=true;
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
                    if($("#saveormod").attr("name")==="addElev"){
                        $("#saveormod").button("loading");
                        $.ajax({  
                            type: 'POST',  
                            url: "{{URL('/admin/addelev')}}", 
                            data: 
                                { 
                                    id_grupa:id_grupa,
                                    nume:nume,
                                    prenume:prenume
                                },
                            success: function(data) {
                                $("input[name=nume]").val("");
                                $("input[name=prenume]").val("");
                                afiseaza(data);
                                $("#saveormod").button("reset");
                            }
                        });
                    }else{
                        $("#saveormod").button("loading");
                        $.ajax({  
                            type: 'POST',  
                            url: "{{URL('/admin/modelev')}}", 
                            data: 
                                { 
                                    id:$("#saveormod").attr("idmod"),
                                    nume:nume,
                                    prenume:prenume
                                },
                            success: function(data) {
                                $("input[name=nume]").val("");
                                $("input[name=prenume]").val("");
                                afiseaza(data);
                                $("#saveormod").button("reset");
                                $("#saveormod").attr("name","addElev");
                                $("#saveormod").removeAttr("idmod");
                            }
                        });
                    }
                }
            });
            /*Adauga ani*/
            $("button[name=save_add_an]").on("click",function(){
                var an=$("input[name=input_add_an]").val();
                if(an>0 && an<9999){
                    $(this).button("loading");
                    $.ajax({  
                        type: 'POST',  
                        url: "{{URL('/admin/addan')}}", 
                        data: 
                            { 
                                an:an
                            },
                        success: function(data) {
                            $("#totiani").append("<label for='an"+data.id+"' class='labels'><input type='radio' id='an"+data.id+"' value="+data.id+" name='radio_an'/> <span>"+data.an+"</span></label>");
                            $("#add_an").modal("hide");
                            $("input[name=input_add_an]").css("border-color","#ccc");
                            $("button[name=save_add_an]").button("reset");
                        }
                    });
                }else{
                    $("input[name=input_add_an]").css("border-color","red");
                }
            });
            /*Adauga grupe*/
            $("button[name=save_add_grupa]").on("click",function(){
                var grupa=$("input[name=input_add_grupa]").val();
                var id_an=$("input[name=radio_an]:checked").val();
                if(grupa.length>0 && grupa.length<50){
                    $(this).button("loading");
                    $.ajax({  
                        type: 'POST',  
                        url: "{{URL('/admin/addgrupa')}}", 
                        data: 
                            { 
                                grupa:grupa,
                                id_an:id_an
                            },
                        success: function(data) {
                            $("#toategrupele").append("<label for='grupa"+data.id+"' class='labels' name="+data.id_an+" ascunde='ascunde'><input type='radio' id='grupa"+data.id+"' value="+data.id+" name='radio_grupa'/> <span>"+data.nume_grupa+"</span></label>");
                            $("#add_grupa").modal("hide");
                            $("input[name=input_add_grupa]").css("border-color","#ccc");
                            $("button[name=save_add_grupa]").button("reset");
                        }
                    });
                }else{
                    $("input[name=input_add_grupa]").css("border-color","red");
                }
            });
        });
    </script>
@endsection
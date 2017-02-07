@extends("main.base")
@section("content")
<div class="col-md-12 meserii whiteclass intrebari">
    <form class="form-group" name="formproblema">
        <b>Date de contact:</b><br>
        <i>(Toate câmpurile sunt obligatorii !)</i></br>
        <div class="form-group">
            <label>Nume: </label>
            <input type="text" name="nume" placeholder="Nume" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Prenume: </label>
            <input type="text" name="prenume" placeholder="Prenume" class="form-control">
        </div>
        <div class="form-group">
            <label>Telefon:</label>
            <input type="text" name="telefon" placeholder="Telefon" class="form-control">
        </div>
        <div class="form-group">
            <label>E-mail:</label>
            <input type="email" name="email" placeholder="E-mail" class="form-control">
        </div>
        <div class="form-group">
            <b>Problema:</b><br>
            <textarea class="form-control" rows="4"  name="problema" class="form-control" style="resize: vertical; "></textarea>
        </div>
        <button type="submit" id="sendbutton" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se trimite" class="btn btn-primary">
            Transmite
        </button>
    </form>
</div>
<div class="modal fade" id="sendedmesage" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title text-center">Mesaj trimis</h3>
        </div>
        <div class="modal-body text-center">
            <h2 class="calibri" style="margin: 0px 0px 15px 0px;">
                <span class="text-success">
                    Mesajul a fost trimis cu succes !
                </span>
            </h2>
            <button class="btn btn-default" data-dismiss="modal">Bine</button>
        </div>
      </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("form[name=formproblema]").on("submit",function(e){
            e.preventDefault();
            var nume=$("input[name=nume]");
            var prenume=$("input[name=prenume]");
            var telefon=$("input[name=telefon]");
            var email=$("input[name=email]");
            var problema=$("textarea[name=problema]");
            
            nume.css("border-color","#ccc");
            prenume.css("border-color","#ccc");
            telefon.css("border-color","#ccc");
            email.css("border-color","#ccc");
            problema.css("border-color","#ccc");
            var permit=true;
            if((problema.val()).length===0 || (problema.val()).length>2000){
                problema.css("border-color","red");
                problema.focus();
                permit=false;
            }
            if((email.val()).length===0 || (email.val()).length>100){
                email.css("border-color","red");
                email.focus();
                permit=false;
            }
            if((telefon.val()).length===0 || (telefon.val()).length>11){
                telefon.css("border-color","red");
                telefon.focus();
                permit=false;
            }
            if((prenume.val()).length===0 || (prenume.val()).length>100){
                prenume.css("border-color","red");
                prenume.focus();
                permit=false;
            }
            if((nume.val()).length===0 || (nume.val()).length>100){
                nume.css("border-color","red");
                nume.focus();
                permit=false;
            }
            if(permit===true){
                $("#sendbutton").button("loading");
                $.ajax({  
                    type: 'POST',  
                    url: '{{ URL("/sendproblem") }}', 
                    data: 
                        { 
                            nume:nume.val(),
                            prenume:prenume.val(),
                            telefon:telefon.val(),
                            email:email.val(),
                            problema:problema.val()
                        },
                    success: function(data) {
                        $("#sendbutton").button("reset");
                        $("#sendedmesage").modal();
                        $("form[name=formproblema]")[0].reset();
                    }
                }); 
            }
        });
    });
</script>
@endsection
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

<script>
    function afiseaza(data){
        
    }
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
                    alert("da");
                    $("#saveormod").button("reset");
                }
            });
            
        }
    });
</script>
@endsection
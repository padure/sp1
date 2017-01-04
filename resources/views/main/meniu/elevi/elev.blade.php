@extends("main.base")
@section("content")
    <div class="col-md-12">
        <div class="elevi-absolventi">
            <div class="form-group">
                @if(!empty($post["ani"]) && !empty($post["grupe"]))
                    <div class="col-md-6">
                        <label for="sel1">Selectati anul absolvirii</label>
                        <select class="form-control" name="anul">
                            @foreach($post["ani"] as $i)
                                <option value="{{$i->id}}">{{$i->an}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="sel1">Selectati grupa</label>
                        <select class="form-control" name="grupa">
                            @foreach($post["grupe"] as $i)
                                <option value="{{$i->id}}" name="{{$i->id_an}}">{{$i->nume_grupa}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-12 table-responsive tabel-elevi">
        <style>
            #loader{
                width: 150px;
                margin:0 auto;
                display:none;
            }
        </style>
        <div id="loader">
            <img src="{{asset("allimages/system/loader.gif")}}" class="img-responsive"/>
        </div>
        <table class="table table-striped" id="tableelev">
        </table>
    </div>
<script>
    $(document).ready(function() {
        function showload(){
            $("#loader").show();
            $("#tableelev").html("");
        }
        function afiseaza(data){
            if(data.length>0){
                $("#tableelev").html("<tr class='info'><th>Nr</th><th>Nume</th><th>Prenume</th><th>Grupa</th><th>Anul absolvirii</th></tr>");
                for(var i=0;i<data.length;i++){
                    $("#tableelev").append("<tr><td>"+(i+1)+"</td><td>"+data[i].nume+"</td><td>"+data[i].prenume+"</td><td>"+data[i].nume_grupa+"</td><td>"+data[i].an+"</td></tr>");
                }
            }else{
                $("#tableelev").html("<tr><td>Nu sunt elevi in aceasta grupa</td></tr>");
            }
            $("#loader").hide();
        }
        function initializeaza(){
            showload();
            $("select[name=grupa] option").hide();
            var m=$("select[name=anul]").val();
            $("select[name=grupa]").val($("select[name=grupa] option[name="+m+"]:first").val());
            $("select[name=grupa] option[name="+m+"]").show();
            var grupa=$("select[name=grupa]").val();
            $.ajax({
                type:"post",
                url:"{{URL('/elevi/getelevi')}}",
                data:{
                    grupa:grupa
                },
                success:function(data){
                    afiseaza(data);
                }
            });
        }
        initializeaza();
        $("select[name=anul]").on("change",function() {
            initializeaza();
        });
        $("select[name=grupa]").on("change",function() {
            showload();
            var grupa=$("select[name=grupa]").val();
            $.ajax({
                type:"post",
                url:"{{URL('/elevi/getelevi')}}",
                data:{
                    grupa:grupa
                },
                success:function(data){
                    afiseaza(data);
                }
            });
        });
    });
</script>
@endsection
@extends("admin.base")
@section("content")
    <p class="text-danger text-center"><b>Nota:</b> Pentru modificarea regulamentului va rugam sa stergeti regulamentul vechi si sa-l adaugati din nou</p>
    <div class="col-md-6">
        <label class="text-info">Nume Regulament: </label> 
        <span class="text-info">(Ex.Regulamentul de activitate a căminurilor)</span>
        <input type="text" name="nume" class="form-control" placeholder="Nume reglament" style="margin-bottom: 10px;"/>
        <label class="text-info">Fisierul PDF: </label>
        <form id="upload" enctype="multipart/form-data" style="width: 30%;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label class="file">
                <a class="btn btn-info">
                    <span class="glyphicon glyphicon-upload"></span>
                    Alege fisier
                </a>
                <input type="file" name="file" style="display: none;"><br>
            </label>
            <p id="error" class="text-danger"></p>
        </form>
        <button class="btn btn-primary" id="saveregulament" name="save" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se adauga">
            Adauga
        </button>
    </div>
    
    @if(!empty($post) && count($post)>0)
        <div class="col-md-12">
            @foreach($post as $i)
                <p>
                    <a target="_blank" href="{{asset($i->link)}}">
                        {{$i->nume}}
                    </a>
                </p>
            @endforeach
        </div>
    @endif
    
    <script>
        $("#saveregulament").on("click",function(){
            var nume=$("input[name=nume]").val();
            
        });
    </script>
@endsection
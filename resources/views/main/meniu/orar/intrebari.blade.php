@extends("main.base")
@section("content")
<div class="col-md-12 meserii whiteclass intrebari">
    <form class="form-group">
        <b>Date de contact:</b><br>
        <i>(Toate câmpurile sunt obligatorii !)</i></br>
        <label>Nume: </label><input type="text" name="nume" id="nume" placeholder="Nume" class="form-control"/><br>
        <label>Prenume: </label><input type="text" name="prenume" id="prenume" placeholder="Prenume" class="form-control"><br>
        <label>Telefon:</label><input type="text" name="telefon" id="telefon" placeholder="Telefon" class="form-control"><br>
        <label>E-mail:</label><input type="e-mail" name="mail" id="mail" placeholder="E-mail" class="form-control"><br>
        <b>Problema:</b><br>
        <textarea class="form-group" rows="4"  id="problema" name="problema" class="form-control"></textarea><br>
        <button type="submit" class="btn btn-primary">Transmite</button>
    </form>
</div>
@endsection
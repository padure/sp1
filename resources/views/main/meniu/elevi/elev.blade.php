@extends("main.base")
@section("content")
<div class="col-md-12">
<form method="" action="" class="elevi-absolventi">
    <div class="form-group">
        <div class="col-md-6">
      <label for="sel1">Selectati anul absolvirii</label>
      <select class="form-control" id="anul">
        <option>2016</option>
        <option>2017</option>
        <option>2018</option>
        <option>2019</option>
      </select>
      </div>
        <div class="col-md-6">
      <label for="sel1">Selectati grupa</label>
      <select class="form-control" id="grupa">
        <option>I1221</option>
        <option>B1121</option>
        <option>C1231</option>
        <option>E1231</option>
      </select>
      </div>
    </div>
 </form>
</div>
<div class="col-md-12 table-responsive tabel-elevi">
<table class="table table-bordered table-hover">
    <tr class="info">
        <th>Nr</th><th>Nume</th><th>Prenume</th><th>Grupa</th><th>Anul absolvirii</th>
    </tr>
    <tr>
        <td>1</td><td>Alin</td><td>Alina</td><td>E1231</td><td>2016</td>
    </tr>
    <tr>
        <td>1</td><td>Alin</td><td>Alina</td><td>E1231</td><td>2016</td>
    </tr>
    <tr>
        <td>1</td><td>Alin</td><td>Alina</td><td>E1231</td><td>2016</td>
    </tr>
    <tr>
        <td>1</td><td>Alin</td><td>Alina</td><td>E1231</td><td>2016</td>
    </tr>
    <tr>
        <td>1</td><td>Alin</td><td>Alina</td><td>E1231</td><td>2016</td>
    </tr>
</table>
    </div>
@endsection
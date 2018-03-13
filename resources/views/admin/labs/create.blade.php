@extends("layouts.app")
@section("title", "Vitae NET - Add Labs")
@section("content")
<div class="container col-md-8 col-md-offset-2">
  <div class="panel">
    <div class="panel-default panel-heading">
      <h3>Create new lab result</h3>
    </div>
    <div class="panel-body">
      <div class="container">
        <form class="form-horizontal" method="POST" action="/labs" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="name" class="col-md-2 control-label">Name:</label>
            <div class="col-md-6">
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
          </div>
          <div class="form-group">
            <label for="doc" class="col-md-2 control-label">Lab result document:</label>
            <div class="col-md-6">
              <input type="file" id="doc" name="doc" required>
              <p class="help-block">Upload the desired file here</p>
            </div>
          </div>
          <div class="form-group">
            <label for="description" class="col-md-2 control-label">Description:</label>
            <div class="col-md-6">
              <input type="text" class="form-control" id="description" name="description" required>
            </div>
          </div>
          <div class="form-group">
            <label for="patient_id" class="col-md-2 control-label">Patient ID:</label>
            <div class="col-md-6">
              <input type="text" class="form-control" id="patient_id" name="patient_id" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-2">
              <a class="btn btn-default" href="{{ url()->previous() }}">Cancel</a>
            </div>
            <div class="col-md-1">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

<form method="POST" action="{{route('importUsers')}}" enctype="multipart/form-data">
  @csrf

  <div class="form-group">
    <label for="excel-file">Excel File</label>
    <input id="excel-file" type="file" name="file" accept=".xls,.xlsx" required>
  </div>

  <button type="submit">Import Users</button>
</form>

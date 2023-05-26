<div class="delete-container">

</div>
<div class="table-responsive">
  <table class="table table-striped table-bordered nowrap">
    <thead>
      <tr>
        <td>
          <input type="checkbox" class="form-check-input checkbox-all checkbox">
        </td>
        <td>No</td>
        <td>Name</td>
        <td>Position</td>
        <td>Office</td>
        <td>Start Date</td>
        <td>
          <i class="bi bi-sliders2"></i>
        </td>
      </tr>
    </thead>
    <tbody>
      @foreach ($employees as $employee)
        <tr>
          <td>
            <input type="checkbox" name="ids" class="form-check-input delete-checkbox checkbox" value="{{ $employee->id }}">
          </td>
          <td>{{ $no++ }}</td>
          <td>{{ $employee->name }}</td>
          <td>{{ $employee->position }}</td>
          <td>{{ $employee->office }}</td>
          <td>{{ $employee->start_date }}</td>
          <td class="d-flex justify-content-center">
            <button type="button" class="btn btn-sm editEmployeeModalBtn" data-employee-id="{{ $employee->id }}">
              <i class="bi bi-pencil-square"></i>
            </button>
            <button type="button" class="btn btn-sm deleteEmployeeModalBtn" data-employee-id="{{ $employee->id }}">
              <i class="bi bi-x-circle"></i>
            </button>
          </td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td>
          <input type="checkbox" class="form-check-input checkbox-all checkbox">
        </td>
        <td>No</td>
        <td>Name</td>
        <td>Position</td>
        <td>Office</td>
        <td>Start Date</td>
        <td>
          <i class="bi bi-sliders2"></i>
        </td>
      </tr>
    </tfoot>
  </table>
</div>
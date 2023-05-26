<form method="post" id="editEmployeeForm">
  @csrf
  @method('put')
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $employee->name) }}" id="name" placeholder="Employee Name" autocomplete="off">
  </div>
  <div class="mb-3">
    <label for="positionForm" class="form-label">Position</label>
    <select name="position_id" class="form-select" id="positionForm">
      <option>Select Position</option>
      @foreach ($positions as $position)
        <option value="{{ $position->id }}" 
          @if ($position->position == $employee->position)
            selected 
          @endif>
          {{ $position->position }}
        </option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="officeForm" class="form-label">Office</label>
    <select name="office_id" class="form-select" id="officeForm">
      <option selected>Select Office</option>
      @foreach ($offices as $office)
        <option value="{{ $office->id }}" 
          @if ($office->office == $employee->office)
            selected
          @endif>
          {{ $office->office }}
      </option>
      @endforeach
    </select>
  </div>
  <div class="mb-4">
    <label for="startDateForm" class="form-label">Start Date</label>
    <input type="date" name="start_date" value="{{ old('start_date', $employee->start_date) }}" class="form-control" id="startDateForm">
  </div>
  <button type="submit" class="btn btn-sm btn-primary">
    <i class="bi bi-pencil-square"></i> Edit
  </button>
</form>
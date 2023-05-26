<form method="post" id="createEmployeeForm">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Employee Name" autocomplete="off">
  </div>
  <div class="mb-3">
    <label for="positionForm" class="form-label">Position</label>
    <select name="position_id" value="{{ old('position_id') }}" class="form-select" id="positionForm">
      <option selected>Select Position</option>
      @foreach ($positions as $position)
        <option value="{{ $position->id }}">{{ $position->position }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="officeForm" class="form-label">Office</label>
    <select name="office_id" value="{{ old('office_id') }}" class="form-select" id="officeForm">
      <option selected>Select Office</option>
      @foreach ($offices as $office)
        <option value="{{ $office->id }}">{{ $office->office }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-4">
    <label for="startDateForm" class="form-label">Start Date</label>
    <input type="date" name="start_date" value="{{ old('start_date', date('Y-m-d')) }}" class="form-control" id="startDateForm">
  </div>
  <button type="submit" class="btn btn-sm btn-primary">
    <i class="bi bi-plus"></i> Create
  </button>
</form>
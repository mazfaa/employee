<div class="card mb-4 w-50 bg-light">
  <div class="card-body">
    <input type="checkbox" class="me-2 align-middle" name="delete_checkbox" id="deleteCheckbox">
    <span class="me-4 align-middle"><span id="selectedCheckboxCounter"></span> Employee Selected</span>
    <button type="button" class="btn btn-sm btn-danger me-3 align-middle" id="multipleDeleteBtn">Delete Employee</button>
    <button type="button" class="btn btn-sm btn-light text-primary border align-middle" id="cancelDeleteBtn">Cancel</button>
  </div>
</div>

<form method="post" id="employeeDeleteForm">
  @csrf
  @method('delete')
  <button type="button" class="btn btn-sm" data-bs-dismiss="modal">Cancel</button>
  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
</form>
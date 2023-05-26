const log = console.log;

function closeModalBtn() {
  $('.btn-close').click();
}

function sweetAlert(title, status, action) {
  Swal.fire({
    title: title,
    text: `Employee ${action} Successfully!`,
    icon: status,
  });
}

function getEmployees() {
  $('#employeeContainer').load('/employee', function() {
    $('.table').DataTable();

    $('.editEmployeeModalBtn').click(function() {
      editEmployee($(this).data('employee-id'));
    });

    $('.deleteEmployeeModalBtn').click(function() {
      deleteEmployee($(this).data('employee-id'));
    });
    
    $('.checkbox-all').click(function() {
      $('.checkbox').prop('checked', $(this).prop('checked'));
      if ($('.checkbox:checked').length !== 0) {
        $('.delete-container').load('/employee/delete .card', function() {
          $('#deleteCheckbox').attr('checked', '');
          $('#selectedCheckboxCounter').html($('.delete-checkbox:checked').length);
          $('#multipleDeleteBtn').click(function() {
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                const ids = [];
                $('input:checkbox[name=ids]:checked').each(function() {
                  ids.push($(this).val());
                });
        
                const data = {
                  ids: ids,
                  _token: $('meta[name=csrf-token]').attr('content'),
                  _method: 'delete'
                };
                
                $.post('/employee/destroy', data, function() {
                  getEmployees();
                });
  
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                );
              }
            });
          });
          $('#cancelDeleteBtn').click(function() {
            $('.delete-container').html('');
            $('.checkbox').prop('checked', false);
          });
        });
      } else {
        $('.delete-container').html('');
      }
    });

    $('.checkbox').click(function() {
      if ($('.checkbox:checked').length === 1) {
        $('.delete-container').html('');
        $('.delete-container').load('/employee/delete .card', function() {
          $('#deleteCheckbox').attr('checked', '');
          $('#selectedCheckboxCounter').html($('.checkbox:checked').length);
          $('#multipleDeleteBtn').click(function() {
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                const ids = [];
                $('input:checkbox[name=ids]:checked').each(function() {
                  ids.push($(this).val());
                });
        
                const data = {
                  ids: ids,
                  _token: $('meta[name=csrf-token]').attr('content'),
                  _method: 'delete'
                };
                
                $.post('/employee/destroy', data, function() {
                  getEmployees();
                });

                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                );
              }
            });
          });
    
          $('#cancelDeleteBtn').click(function() {
            $('.delete-container').html('');
            $('.checkbox').prop('checked', false);
          });
        });
      } else {
        if ($('.checkbox:checked').length === 0) {
          $('.delete-container').html('');
        }
      }
    });
    

    $('.checkbox').change(function() {
      $('#selectedCheckboxCounter').html($('.checkbox:checked').length);
    });
  });
}

function createEmployee() {
  $('#modal').modal('show');
  $('#modalLabel').text('Create Employee');
  $('.modal-body').load('/employee/create', function() {
    $('#createEmployeeForm').submit(function(e) {
      e.preventDefault();
      storeEmployee($(this).serialize());
    });
  });
}

function storeEmployee(formData) {
  $.post('/employee/store', formData, function() {
    getEmployees();
    closeModalBtn();
    sweetAlert('Success', 'success', 'Created');
  });
}

function editEmployee(id) {
  $('#modal').modal('show');
  $('#modalLabel').text('Edit Employee');
  $('.modal-body').load(`/employee/edit/${id}`, function() {
    $('#editEmployeeForm').submit(function(e) {
      e.preventDefault();
      updateEmployee($(this).serialize(), id);
    });
  });
}

function updateEmployee(formData, id) {
  $.post(`/employee/update/${id}`, formData, function() {
    getEmployees();
    closeModalBtn();
    sweetAlert('Success', 'success', 'Updated');
  });
}

function deleteEmployee(id) {
  $('#modal').modal('show');
  $('#modalLabel').text('Delete Employee');
  $('.modal-body').load(`/employee/delete/${id} form`, function() {
    $('#employeeDeleteForm').submit(function(e) {
      e.preventDefault();
      destroyEmployee(id);
    });
  });
}

function destroyEmployee(id) {
  $.post(`/employee/delete/${id}`, {
    _token: $('meta[name=csrf-token]').attr('content'),
    _method: 'delete'
  }, function() {
    getEmployees();
    closeModalBtn();
    sweetAlert('Success', 'success', 'Deleted');
  });
}

$(document).ready(function() {
  getEmployees();
});

$('#createEmployeeModalBtn').click(function() {
  createEmployee();
});
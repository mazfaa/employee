<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function getEmployees() {
        return Employee::select(
            'employees.name', 'positions.position', 
            'offices.office', 'employees.start_date',
            'employees.id'
        )
        ->join('positions', 'positions.id', '=', 'employees.position_id')
        ->join('offices', 'offices.id', '=', 'employees.office_id')
        ->get();
    }

    public function findEmployee($id) {
        return Employee::select(
            'employees.name', 'positions.position', 
            'offices.office', 'employees.start_date',
            'employees.id'
        )
        ->join('positions', 'positions.id', '=', 'employees.position_id')
        ->join('offices', 'offices.id', '=', 'employees.office_id')
        ->where('employees.id', $id)
        ->first();
    }

    public function index() {
        return view('index', [
            'no' => 1,
            'offices' => Office::all(),
            'positions' => Position::all(),
            'employees' => $this->getEmployees(),
        ]);
    }

    public function read() {
        return view('_read', [
            'no' => 1,
            'employees' => $this->getEmployees()
        ]);
    }

    public function create() {
        return view('_create', [
            'offices' => Office::all(),
            'positions' => Position::all(),
        ]);
    }

    public function store(Request $request) {
        $attributes = $request->validate([
            'name' => 'required',
            'position_id' => ['required', Rule::exists('positions', 'id')],
            'office_id' => ['required', Rule::exists('offices', 'id')],
            'start_date' => 'required|date',
        ]);
        Employee::create($attributes);
    }

    public function edit($id) {
        return view('_update', [
            'offices' => Office::all(),
            'positions' => Position::all(),
            'employee' => $this->findEmployee($id)
        ]);
    }

    public function update(Request $request, $id) {
        $attributes = $request->validate([
            'name' => 'required',
            'position_id' => ['required', Rule::exists('positions', 'id')],
            'office_id' => ['required', Rule::exists('offices', 'id')],
            'start_date' => 'required|date',
        ]);
        Employee::where('id', $id)->update($attributes);
    }

    public function delete() {
        return view('_delete');
    }

    public function destroy(Request $request) {
        Employee::whereIn('id', $request->ids)->delete();
    }

    public function remove($id) {
        return view('_delete', [
            'employee' => $this->findEmployee($id)
        ]);
    }

    public function wipe($id) {
        Employee::find($id)->delete();
    }
}

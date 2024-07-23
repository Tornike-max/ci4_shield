<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use CodeIgniter\HTTP\ResponseInterface;

class StudentController extends BaseController
{
    public $students;

    public function __construct()
    {
        $this->students = model(StudentModel::class);
    }
    public function index()
    {
        $studentsList = $this->students->orderBy('id', 'desc')->paginate(5);
        if (count($studentsList) === 0) {
            return view('students/empty', [
                'title' => 'No Students'
            ]);
        }
        return view('students/index', [
            'students' => $studentsList,
            'pager' => $this->students->pager
        ]);
    }

    public function show()
    {
        //
    }

    public function create()
    {
        return view('students/create');
    }

    public function store()
    {
        helper('form');

        $rules = [
            'name' => 'required|min_length[2]',
            'email' => 'required|valid_email',
            'phone' => 'required|max_length[13]',
            'profile_image' => 'permit_empty|is_image[profile_image]'
        ];
        if (!$this->validate($rules)) {

            return redirect()->to(base_url('students/create'))->withInput()->with('error', 'Error while creating user');
        };

        $validated = $this->validator->getValidated();

        $this->students->save($validated);
        return redirect()->to(base_url('students'));
    }

    public function edit(string $id)
    {
        helper('form');

        $student = $this->students->find($id);
        if (count($student) === 0) {
            return view('students/empty', [
                'title' => 'No Student Founded'
            ]);
        }
        return view('students/edit', [
            'student' => $student
        ]);
    }

    public function update(string $id)
    {
        helper('form');

        $rules = [
            'name' => 'required|min_length[2]',
            'email' => 'required|valid_email',
            'phone' => 'required|max_length[13]',
            'profile_image' => 'permit_empty|is_image[profile_image]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('students/create'))->withInput()->with('error', 'Error while creating user');
        }

        $validated = $this->validator->getValidated();

        $file = $this->request->getFile('profile_image');
        if (is_uploaded_file($file) && !empty($file)) {
            $filename = $file->getName();
            $namearr = explode('.', $filename);
            $filepath = time() . '.' . end($namearr);
            if ($file->move('images', $filepath)) {
                $validated['profile_image'] = $filepath;
            }
        }

        $this->students->update($id, $validated);

        return redirect()->to(base_url('students'))->with('success', 'Student Updated Successfully');
    }

    public function destroy(string $id)
    {
        $this->students->delete($id);
        return redirect()->to(base_url('students'))->with('success', 'Student Deleted Successfully');
    }
}

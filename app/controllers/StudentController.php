<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    public function index()
    {
        $this->call->view('welcome_page');
    }

    public function profile()
    {
        $student = [
            'student_id' => '2024-00105',
            'name'       => 'Rheinne Aubrey Adora',
            'course'     => 'BS Information Technology',
            'year'       => '3rd Year',
            'section'    => 'F3',
            'email'      => 'rheinne19aubrey@gmail.com'
        ];

        $this->call->view('student_profile', $student);
    }
}
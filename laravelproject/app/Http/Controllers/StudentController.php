<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $data = Student::where("deleted_at", null)->orderBy('id', "DESC")->get();

        return json_encode($data);
    }

    public function find($id)
    {
        $data = Student::find($id);

        return json_encode($data);
    }

    public function store(Request $request)
    {
        $rules = [
            "name" => "required",
            "email" => "required"
        ];
        $messages = [
            "name.required" => "Name field is required",
            "email.required" => "email field is required",
        ];
        $validator = Validator::make($request->all(), $rules, $messages, [
            'name' => "Name Field",
            'email' => "email address"
        ]);

        if ($validator->fails()) {
            return json_encode(
                $validator->errors()
            );
        } else {
            $student = new Student();
            $student->name = $request->name;
            $student->email = $request->email;
            $student->save();
            return json_encode(
                [
                    "statusCode" => 200
                ]

            );
        }
    }
    public function Edit(Request $request)
    {
        $rules = [
            "name" => "required",
            "email" => "required"
        ];
        $messages = [
            "name.required" => "Name field is required",
            "email.required" => "email field is required",
        ];
        $validator = Validator::make($request->all(), $rules, $messages, [
            'name' => "Name Field",
            'email' => "email address"
        ]);

        if ($validator->fails()) {
            return json_encode(
                $validator->errors()
            );
        } else {

            $student = Student::find($request->id);
            $student->name = $request->name;
            $student->email = $request->email;
            $student->update();
            return json_encode(
                [
                    "statusCode" => 200
                ]

            );
        }
    }

    public function delete($id)
    {
        $student = Student::find($id)->delete();
        return json_encode([
            "statusCode" => 200,
            "data" => $student,
            "Message" => "Student Deleted"
        ]);
    }
}

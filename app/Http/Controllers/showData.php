<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Student;

class showData extends Controller
{
    //
    function list(){

        // $data = Student::all(); //THIS WILL FETCH ALL THE DATA SIMPLY
        $data = Student::paginate(5);
        // $data = $data->sortBy('urn'); it is throwing error
        return view('show',['data'=>$data]);
    }

    function insert(Request $req)
    {
        $stu = new Student;
        $stu->name = $req->name;
        $stu->urn = $req->urn;
        $flag = $stu->save();
        $req->session()->flash('flag_i',$flag);
        $req->session()->flash('name',$req->name);
        $req->session()->flash('urn',$req->urn);
        return redirect('show');
    }

    function update(Request $req)
    {
        // $stu = new Student;
        $stu = Student::find($req->id);
        $stu->name = $req->name;
        $stu->urn = $req->urn;
        $flag = $stu->save();
        $req->session()->flash('flag_u',$flag);
        $req->session()->flash('name',$req->name);
        $req->session()->flash('urn',$req->urn);
        return redirect('show');
        // return Student::find($req->id);
    }

    function edit($id)
    {
        $data = Student::find($id);
        return view('edit',['data'=>$data]);
    }

    function delete(request $req,$id)
    {
        $data = Student::find($id);
        $flag = $data->delete();
        $req->session()->flash('flag_d',$flag);
        $req->session()->flash('name',$data->name);
        $req->session()->flash('urn',$data->urn);
        return redirect('show');
    }
}

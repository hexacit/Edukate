<?php

namespace App\Http\Controllers\website;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExcelController extends Controller
{
    public function importUsersView()
    {
        return view('importUsersView');
    }
    public function importUsers(request $request)
    {
        $roles =  [

            'file'=>'required|max:50000|mimes:xlsx,xls'
        ];

        $this->validate($request, $roles);


        //return $request->file('file');
        $file = $request->file('file');
        $file_name = rand(1000000, 9999999) . ".xlsx";
        $file->move(public_path().'/uploads/excel', $file_name);
        Excel::import(new UsersImport, public_path().'/uploads/excel/'.$file_name);
        return redirect('/')->with('success', 'Users imported successfully.');
    }

    
    public function exportUsers()
{
    return Excel::download(new UsersExport, 'users.xlsx');
}


}





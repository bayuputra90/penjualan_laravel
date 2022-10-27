<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    // menampilkan halaman awal category
    public function index() {
        // Mengambil semua data pada table categories
        $categories = Category::all();
        $data = [
            'categories' => $categories
        ];

        return view('admin/category/index')->with($data);
    }
    // menampilkan form tambah category
    public function create() {
        return view('admin.category.create');
    }

    // menyimpan category ke dalam database
    public function store(Request $request) {
        // setting rules validasi data

        $rules = [
            'name' => 'required',
            'status' => 'required'
        ];

        $messages = [
            'name.required' => 'Nama tidak boleh kosong'
        ];


        // validasi data
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            // jika data tidak valid
            return redirect('admin/category/create')
                ->withErrors($validator);
        }
        else {
            // jika data valid
            // simpan ke database
            $category = new Category;
            $category->name = $request->input('name');
            $category->status = $request->input('status');
            $category->save();

            // set flash message
            session()->flash('message', 'Category successfully saved');

            // redirect ke halaman index category
            return redirect('admin/category');
        }
    }

    public function show($id) {
        //ambil data category untuk id tertentu
        $category = Category::find($id);
        $data = [
            'category' => $category
        ];

        return view('admin/category/show',$data);
    }

    public function edit($id) {
        //ambil data category untuk id tertentu
        $category = Category::find($id);

        $data = [
            'category' => $category
        ];

        return view('admin/category/edit')->with($data);
    }

    // untuk mengupdate data di database
    public function update(Request $request,$id) {
        // setting rules validasi data
        $rules = [
            'name' => 'required',
            'status' => 'required'
        ];

        $messages = [
            'name.required' => 'Nama tidak boleh kosong'
        ];

        // validasi data
        $validator = Validator::make($request->input(), $rules, $messages);

        if($validator->fails()) {
            // jika data tidak valid
            return Redirect("admin/category/{$id}/edit")
                ->withErrors($validator);
        }
        else {
            // jika data valid
            // update ke database
            $category = \App\Models\Category::find($id);
            $category->name = $request->Input('name');
            $category->status = $request->Input('status');
            $category->save();

            // set flash message
            session()->flash('message', 'Category successfully updated');

            // redirect ke halaman index category
            return Redirect('admin/category');
        }
    }

    public function destroy($id) {
        // ambil data dari database berdasar $id
        $category = Category::find($id);
        $category->delete();

        session()->flash('message', 'Category successfully deleted');

        return redirect('admin/category');
    }
}

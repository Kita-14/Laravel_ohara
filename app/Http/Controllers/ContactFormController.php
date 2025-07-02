<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactForm;
use COM;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // *DBから情報を取得 モデル名:select(カラム名)->get()出DBから指定したカラムをすべて取得
        $contacts = ContactForm::select('id', 'name', 'title', 'gender', 'created_at')->get();
        // *genderの値と表示名を結び付け
        $a = 1;
        // *処理:contactsフォルダ内のindex.blade.phpを返す
        // *viewメソッドの第二引数で変数を指定するとビュー側に変数を渡すことができる
        // *変数を渡すときにはcompact()でまとめて渡すことができる
        return view('contacts.index', compact('contacts', 'a'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // *フォームから送られてきたデータの確認
        // dd($request->contact);
        ContactForm::create([
            'name' => $request->name,
            'title' => $request->title,
            'email' => $request->email,
            'url' => $request->url,
            'gender' => $request->gender,
            'age' => $request->age,
            'contact' => $request->contact
        ]);
        return to_route('contacts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

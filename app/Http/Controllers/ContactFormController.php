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
        // *DBに以下の情報をまとめて登録する処理
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
        // *find ⇒1件データを取得。データが存在しない場合エラー
        // *findOrFail ⇒1件データを取得。データが存在しない場合404
        $contact = ContactForm::findOrFail($id);

        // *性別の判定
        if ($contact->gender === 0) {
            $gender = "男性";
        } else {
            $gender = "女性";
        }
        return view('contacts.show', compact('contact', 'gender'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // *DBから1件だけデータを取得
        $contact = ContactForm::find($id);


        // *性別の判定
        if ($contact->gender === 0) {
            $gender = "男性";
        } else {
            $gender = "女性";
        }

        return view('contacts.edit', compact('contact', 'gender'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // *現在の情報をDBから取得
        $now_contact = ContactForm::findOrFail($id);
        // *フォームで送信されたデータ($request)で現在の情報を上書き
        // *現在の名前にフォームで送信された名前を代入
        $now_contact->name = $request->name;
        $now_contact->title = $request->title;
        $now_contact->email = $request->email;
        $now_contact->url = $request->url;
        $now_contact->gender = $request->gender;
        $now_contact->age = $request->age;
        $now_contact->contact = $request->contact;
        $now_contact->save();

        return to_route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

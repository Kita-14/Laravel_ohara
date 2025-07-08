<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // ←ここ確認。

class ContactForm extends Model
{
    // *factoryを使うためのuse文
    use HasFactory;
    //
    protected $fillable = [
        'name',
        'title',
        'email',
        'url',
        'gender',
        'age',
        'contact',
    ];
    public function scopeSearch($query, $search)
    {
        if ($search !== null) { // *検索ワードが存在するかどうかを判定
            $search_split = mb_convert_kana($search, 's'); //全角スペースを半角
            $search_split2 = preg_split('/[\s]+/', $search_split); //半角スペースで単語に分割
            foreach ($search_split2 as $value) {
                $query->where('name', 'like', '%' . $value . '%');
            }
        }
        return $query;
    }
}

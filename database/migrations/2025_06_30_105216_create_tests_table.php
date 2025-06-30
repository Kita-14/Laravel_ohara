<?php

// *use文。Migration,Blueprint,Schemaのクラスを使用するためにインポート
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// *extends(継承)Migrationクラスを継承した新しいクラスを作成し、リターン。
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // *エロクアント。Schema::メソッドでDBに対する操作が可能。
        // *Schema::create('テーブル名',カラム)でテーブルを作成。
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->timestamps(); // *created_at(作成日時)とupdate_at(更新日時)を自動作成
        });
    }

    /**
     * Reverse the migrations.
     */
    // *downメソッド。ロールバック用の処理を記述。
    public function down(): void
    {
        // *testsテーブルが存在したら削除する
        Schema::dropIfExists('tests');
    }
};
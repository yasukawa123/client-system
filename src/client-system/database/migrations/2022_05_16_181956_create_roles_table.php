<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 8)->comment('ロール名');
            $table->string('memo')->comment('備考');
            $table->timestamps();
        });
        DB::table('roles')->insert(['id'=>1,'name'=>'sv','memo'=>'スーパーバイザー']);
        DB::table('roles')->insert(['id'=>2,'name'=>'clerk','memo'=>'店員']);
        DB::table('roles')->insert(['id'=>3,'name'=>'pt-job','memo'=>'アルバイト']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};

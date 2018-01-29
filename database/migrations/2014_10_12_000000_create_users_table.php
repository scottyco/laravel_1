<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name',30); //username
      $table->string('f_name',30)->default('NULL');
      $table->string('l_name',30)->default('NULL');
      $table->string('email')->unique();
      $table->string('password');
      $table->tinyInteger('level')->default(1);
      $table->rememberToken();
      $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
      $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
      //$table->timestamps();
      //$table->timestamps()->default('CURRENT_TIMESTAMP');
    });
    $this->add_admin();
  }

  private function add_admin(){
    $newUsers=[
      ['email' => 'roy@xsite.co.il', 'level' => 9,'password'=>'123456','f_name'=>'Roy','l_name'=>'Bashiry','name'=>'admin'],
      ['email' => 'roy@scotty.co.il', 'level' => 1,'password'=>'111','f_name'=>'Roy','l_name'=>'xxx','name'=>'user1']
    ];
    foreach ($newUsers as $i => $v) {
      $user = new App\User();
      $user->password = Hash::make($v['password']);
      $user->email = $v['email'];
      $user->level = $v['level'];
      $user->f_name = $v['f_name'];
      $user->l_name = $v['l_name'];
      $user->name = $v['name'];
      $user->save();

    }
    //DB::table('users')->insert(    );
  }


  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    //Schema::dropIfExists('users');
  }
}

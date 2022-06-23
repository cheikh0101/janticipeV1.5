<?php

use App\Models\Ue;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecs', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->string('code')->unique();
            $table->string('user_email');
            $table->foreignIdFor(Ue::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ecs');
    }
}

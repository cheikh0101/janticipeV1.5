<?php

use App\Models\Ec;
use App\Models\TypeDocument;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->string('description');
            $table->string('user_email');
            $table->text('lien')->unique();
            $table->foreignIdFor(Ec::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(TypeDocument::class)->constrained();
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
        Schema::dropIfExists('documents');
    }
}

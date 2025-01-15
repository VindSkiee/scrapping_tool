<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScrapsTableV2 extends Migration
{
    public function up()
    {
        Schema::create('scraps', function (Blueprint $table) {
            $table->id();
            $table->integer('dataset_id');
            $table->string('website_link')->collation('utf8mb4_unicode_ci');
            $table->string('title')->nullable()->collation('utf8mb4_unicode_ci');
            $table->string('backdoor')->nullable()->collation('utf8mb4_unicode_ci');
            $table->integer('vulnerability_level')->nullable();
            $table->text('suggestions')->nullable()->collation('utf8mb4_unicode_ci');
            $table->timestamp('attack_timestamp')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('scraps');
    }
}
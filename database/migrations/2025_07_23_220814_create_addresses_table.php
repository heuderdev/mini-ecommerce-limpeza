<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained('users') 
                  ->onDelete('cascade'); 

           
            $table->string('label')->nullable(); 
            $table->string('type')->default('shipping'); 

            
            $table->string('recipient_name'); 
            $table->string('phone_number')->nullable(); 
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zip_code'); 
            $table->string('country')->default('Brazil'); 
            $table->boolean('is_default')->default(false); 

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};

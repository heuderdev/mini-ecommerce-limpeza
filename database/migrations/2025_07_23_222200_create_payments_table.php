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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')
                  ->constrained('orders')
                  ->onDelete('cascade');
        
            $table->decimal('amount', 10, 2); 
            $table->string('method'); // <<-- Acomoda 'credit_card', 'pix', 'cash_on_delivery', etc.
            $table->string('status'); // <<-- Acomoda 'approved', 'pending', 'awaiting_cash_payment', 'paid', etc.
            $table->string('transaction_code')->nullable()->unique(); // <<-- Nulo para dinheiro, ID para gateway. Unique para gateway.
            $table->string('payment_gateway')->nullable(); // <<-- Nulo para dinheiro, nome do gateway para gateway.
            $table->json('details')->nullable(); // <<-- Nulo para dinheiro, JSON para gateway.
        
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

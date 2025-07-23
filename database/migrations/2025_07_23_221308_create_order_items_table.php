<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // Chave primária auto-incrementável

            // Relacionamento com o pedido ao qual este item pertence
            $table->foreignId('order_id')
                  ->constrained('orders') // Chave estrangeira para a tabela 'orders'
                  ->onDelete('cascade'); // Se um pedido for deletado, seus itens também são

            // Relacionamento com o produto original
            // Usamos nullable e set null para manter o histórico, mesmo se o produto original for removido
            $table->foreignId('product_id')
                  ->nullable()
                  ->constrained('products') // Chave estrangeira para a tabela 'products'
                  ->onDelete('set null'); // Se o produto original for deletado, o item do pedido mantém seu registro, mas sem link.

            // Detalhes do Produto no momento da Compra (Copiados para histórico)
            // É crucial copiar esses dados, pois o preço ou nome do produto pode mudar no futuro.
            $table->string('product_name');
            $table->decimal('product_price', 10, 2); // Preço pelo qual o produto foi vendido NESTE pedido
            $table->integer('quantity'); // Quantidade deste produto neste pedido
            $table->decimal('subtotal', 10, 2); // subtotal = product_price * quantity

            $table->timestamps(); // `created_at` e `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};

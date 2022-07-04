<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("wallet_id");
            $table->unsignedBigInteger("transaction_type_id");
            $table->float("amount");
            $table->integer("in_out")->comment("1.in 2.out");
            $table->boolean("status")->comment("1. success 2.failed");
            $table->foreign("wallet_id")->references("id")->on("wallets")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("transaction_type_id")->references("id")->on("transaction_types")->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('transactions');
    }
}

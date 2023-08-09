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
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->index("bookid");
            $table->index("customerid");
            $table->date("StartDate");
            $table->date("EndDate");
            $table->timestamps();
            //$table->foreign('bookid')->references('id')->on('books');
           // $table->foreign('customerid')->references('id')->on('customers');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->string('payer_name')->nullable()->after('taxpayer_id');
            $table->string('business_name')->nullable()->after('payer_name');
            $table->enum('payment_method', ['gcash','debit_card','cash'])->default('cash')->after('amount');
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn(['payer_name','business_name','payment_method']);
        });
    }
};

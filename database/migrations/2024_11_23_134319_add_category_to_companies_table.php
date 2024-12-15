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
        Schema::table('companies', function (Blueprint $table) {
            $table->enum('category', [
                'IT', 
                'Finance', 
                'Healthcare', 
                'Education', 
                'Retail', 
                'Manufacturing', 
                'Construction', 
                'Real Estate', 
                'Transportation', 
                'Hospitality', 
                'Agriculture', 
                'Energy', 
                'Telecommunications', 
                'Media', 
                'Entertainment', 
                'Legal', 
                'Consulting', 
                'Nonprofit', 
                'Government', 
                'Automotive', 
                'Aerospace', 
                'Fashion', 
                'Food and Beverage', 
                'Pharmaceuticals', 
                'Insurance', 
                'Other'
            ])->default('Other')->after('name');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};

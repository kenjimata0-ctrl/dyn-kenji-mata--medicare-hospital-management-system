
<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        // Patient columns already exist in the database.
    }

    public function down(): void
    {
        // Keep the existing patient columns.
    }
};

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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('slug')->after('isi')->unique();
            $table->string('thumbnail')->after('slug')->nullable();
                                $table->enum('status', ['draft', 'published',
        'archived'])->after('thumbnail')->default('draft');
    
        $table->foreignId('user_id')->after('status')->constrained()->cascadeOnDelete();
        $table->foreignId('category_id')->after('user_id')->nullable()->constrained()->nullOnDelete();
        $table->timestamp('published_at')->nullable();
        $table->unsignedBigInteger('views')->default(0);
        $table->softDeletes();
    });
    }

    public function down(): void
    {
        Schema::table('posts', function(Blueprint $table){
            $table->dropForeign(['user_id','category_id']);
            $table->dropColumn(['slug','thumbnail','status','user_id','category_id','published_at','views','deleted_at']);
            });
        }
};

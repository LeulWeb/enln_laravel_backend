<?php

use App\Enums\EbookCategoryEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ebooks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author')->nullable();
            $table->text('content');
            $table->date('published_date')->default(now());
            $table->string('pdf')->nullable();
            $table->string('youtube_link')->nullable();
            $table->enum('category', [EbookCategoryEnum::PUBLICATION, EbookCategoryEnum::TRAINING, EbookCategoryEnum::LEADERSHIP])->default(EbookCategoryEnum::PUBLICATION);
            $table->string('thumbnail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ebooks');
    }
};

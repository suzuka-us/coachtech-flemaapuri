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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // 商品名
            $table->string('name');

            // 金額 -> 販売価格に変更
            $table->integer('price')->nullable();

            // ブランド -> brand_name に変更
            $table->string('brand_name')->nullable();

            // 説明文 -> description
            $table->text('description')->nullable();

            // 商品画像パス (FN029でカバー) -> image_path に変更
            $table->string('image_path')->nullable();


            // 【追加】商品の状態ID (conditionsテーブルを参照)
            $table->foreignId('condition_id')->constrained();

            // 【修正】出品者ID (user_id) に外部キー制約を追加
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // 【修正】購入者ID (buyer_id) に外部キー制約を追加
            $table->foreignId('buyer_id')
                ->nullable()
                ->constrained('users') // usersテーブルを参照
                ->onDelete('set null'); // ユーザー削除時に関連を解除する

            $table->timestamps();
        });

        // 【追加】商品とカテゴリの多対多リレーション用の中間テーブルを作成
        Schema::create('product_category', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->primary(['product_id', 'category_id']); // 複合主キーを設定
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_category'); // 中間テーブルも削除
        Schema::dropIfExists('products');
    }
};

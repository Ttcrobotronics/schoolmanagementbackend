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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('country', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('profile_image')->nullable();
            $table->string('usertype')->default('student');
            $table->integer('admission_number')->nullable();
            $table->integer('roll_number')->nullable();
            $table->integer('class_id')->nullable();
            $table->string('gender', 100)->nullable();
            $table->string('date_of_birth', 100)->nullable();
            $table->string('caste', 150)->nullable();
            $table->string('religion', 150)->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('admission_date', 100)->nullable();
            $table->string('blood_group', 150)->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('occupation')->nullable();
            $table->string('address')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('qualification')->nullable();
            $table->string('work_experience')->nullable();
            $table->string('note')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('remember_token', 100)->nullable();
            $table->tinyInteger('user_type')->default(3)->comment('1:admin, 2:teacher, 3:student, 4:parent');
            $table->tinyInteger('status')->default(0)->comment('0:active, 1:inactive');
            $table->tinyInteger('is_delete')->default(0)->comment('0:not, 1:yes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

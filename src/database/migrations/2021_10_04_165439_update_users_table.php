<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enum\StatusEnum;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('email_verified_at');
            $table->dropRememberToken();

            $table->string('email',150)->change();
            $table->string('password', 256)->change();

            $table->unsignedBigInteger('client_id')->after('id');
            $table->string('first_name', 50)->after('client_id');
            $table->string('last_name', 50)->after('first_name');
            $table->string('phone', 20)->after('password');
            $table->string('profile_uri', 255)->after('phone');
            $table->enum('status', StatusEnum::getValues())->after('profile_uri');
            $table->timestamp('last_password_reset')->nullable()->after('status');

            $table->softDeletes();

            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('name')->after('id');
            $table->string('email')->after('name')->change();
            $table->timestamp('email_verified_at')->nullable()->after('email');
            $table->string('password')->change();

            $table->rememberToken();

            $table->dropForeign(['client_id']);
            $table->dropColumn('client_id');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('phone');
            $table->dropColumn('profile_uri');
            $table->dropColumn('last_password_reset');
            $table->dropColumn('status');

            $table->dropSoftDeletes();
        });
    }
}

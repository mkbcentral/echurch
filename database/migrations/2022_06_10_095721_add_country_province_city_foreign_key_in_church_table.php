<?php

use App\Models\City;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('churches', function (Blueprint $table) {
            $table->foreignIdFor(Country::class)->nullable()->constrained()->after('coun');
            $table->foreignIdFor(Province::class)->nullable()->constrained()->after('country_id');
            $table->foreignIdFor(City::class)->nullable()->constrained()->after('province_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('churches', function (Blueprint $table) {
            $table->dropColumn('country_id');
            $table->dropColumn('city_id');
            $table->dropColumn('province_id');
        });
    }
};

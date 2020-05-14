<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSamlFieldsToSettings extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('settings', function(Blueprint $table)
		{
			$table->boolean('saml_enabled')->default(0);
            $table->text('saml_idp_metadata')->nullable()->default(NULL);
			$table->string('saml_attr_mapping_username')->nullable()->default(NULL);
            $table->boolean('saml_forcelogin')->default(0);
			$table->boolean('saml_slo')->default(0);
			$table->text('saml_sp_x509cert')->nullable()->default(NULL);
			$table->text('saml_sp_privatekey')->nullable()->default(NULL);
			$table->text('saml_custom_settings')->nullable()->default(NULL);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('settings', function(Blueprint $table)
		{
			$table->dropColumn('saml_enabled', 'saml_idp_metadata', 'saml_attr_mapping_username', 'saml_forcelogin', 'saml_slo', 'saml_sp_x509cert','saml_sp_privatekey', 'saml_custom_settings');
		});
	}

}

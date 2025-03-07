<?php

use App\Models\Enums\StatusClientesEnum;
use App\Models\Enums\TipoPessoaEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome')->nullable(false);
            $table->date('data_nascimento')->nullable(false);
            $table->string('estado_civil')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('telefone');
            $table->string('cpf_cnpj')->nullable(false);
            $table->enum('tipo_pessoa', [TipoPessoaEnum::todos()])->nullable(false);
            $table->enum('status', [StatusClientesEnum::todos()])->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};

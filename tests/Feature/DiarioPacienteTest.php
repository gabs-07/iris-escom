<?php

use App\Models\Diario;
use App\Models\User;

it('permite crear un diario solo con la fecha actual', function () {
    $user = User::factory()->create(['rol' => 1]);

    $response = $this->actingAs($user)->post(route('diarios.store'), [
        'contenido' => 'Hoy me sentí mejor y pude descansar.',
    ]);

    $response->assertRedirect();

    $this->assertDatabaseHas('diarios', [
        'user_id' => $user->id,
        'fecha' => now()->toDateString(),
        'contenido' => 'Hoy me sentí mejor y pude descansar.',
    ]);
});

it('no permite crear dos diarios en la misma fecha', function () {
    $user = User::factory()->create(['rol' => 1]);

    Diario::create([
        'user_id' => $user->id,
        'fecha' => now()->toDateString(),
        'contenido' => 'Primer diario.',
    ]);

    $response = $this->actingAs($user)->post(route('diarios.store'), [
        'contenido' => 'Segundo intento.',
    ]);

    $response->assertRedirect();

    $this->assertDatabaseCount('diarios', 1);
});

it('no permite consultar diarios de otro paciente', function () {
    $patient = User::factory()->create(['rol' => 1]);
    $otherPatient = User::factory()->create(['rol' => 1]);

    $diario = Diario::create([
        'user_id' => $otherPatient->id,
        'fecha' => now()->toDateString(),
        'contenido' => 'Diario privado.',
    ]);

    $this->actingAs($patient)->get(route('diarios.show', $diario))->assertForbidden();
});
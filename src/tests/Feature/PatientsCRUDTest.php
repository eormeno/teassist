<?php

use Tests\TestHelpers;

test('root user can see patients index', function () {
    $root_user = TestHelpers::rootUser();
    $response = $this->actingAs($root_user)->get(route('patients.index'));
    $response->assertStatus(200);
});

test('el codigo de paciente es único', function () {
    $root_user = TestHelpers::rootUser();
    $paciente_1 = [
        'codigo' => 'xxx',
        'apellidos' => 'Doe',
        'nombres' => 'John',
        'dni' => '12345678',
        'nacimiento' => '2000-01-01',
        'sexo' => 'M',
        'telefono' => '123456789',
        'email' => 'john@doe.com',
        'direccion' => '123 Main St',
        'observaciones' => 'Some notes',
    ];
    $paciente_2 = $paciente_1;
    //$paciente_2['codigo'] = 'yyy';
    $paciente_2['dni'] = '87654321';
    $paciente_2['email'] = 'paciente2@dato.com';
    $response = $this->actingAs($root_user)->post(route('patients.store'), $paciente_1);
    $response = $this->actingAs($root_user)->post(route('patients.store'), $paciente_2);

    $response->assertSessionHasErrors('codigo');
});

// test('asegura que el código es único', function () {
//     $root_user = TestHelpers::rootUser();
//     $nuevo_paciente = [
//         'codigo' => 'xxx',
//         'apellidos' => 'Doe',
//         'nombres' => 'John',
//         'dni' => '12345678',
//         'nacimiento' => '2000-01-01',
//         'sexo' => 'M',
//         'telefono' => '123456789',
//         'email' => 'john@doe.com',
//         'direccion' => '123 Main St',
//         'observaciones' => 'Some notes',
//     ];
//     $response = $this->actingAs($root_user)->post(route('patients.store'), $nuevo_paciente);
//     $response->assertSessionHasErrors('codigo');
// });
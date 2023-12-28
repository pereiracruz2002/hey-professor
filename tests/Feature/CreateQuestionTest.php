<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\post;

it('should be able create a new question bigger than 250 characters', function () {
    //arrange
    $user = User::factory()->create();
    actingAs($user);

    //act
    $request = post(route('question.store'), [
        'question' => str_repeat('a', 260).'?']);

    //dd($request);

    $request->assertRedirect(route('dashboard'));
    assertDatabaseCount('questions', 1);
    assertDatabaseHas('questions', ['question' => str_repeat('a', 260).'?']);
    //assert
});

// it('should check if ends with question mark', function() {
//     $user = User::factory()->create();
//     actingAs($user);

//     $request = post(route('question.store'),  [
//         'question' => str_repeat('*', 10),
//     ]);

//     $request->assertSessionHasErrors([
//         'question' => 'Are you sure that is a question? It is missing the question mark in the end.',
//     ]);
//     assertDatabaseCount('questions', 0);

// });
it('should have at last characters', function () {
    $user = User::factory()->create();
    actingAs($user);

    $request = post(route('question.store'), [
        'question' => str_repeat('*', 8).'?',
    ]);

    $request->assertSessionHasErrors(['question' => __('validation.min.string', ['min' => 10, 'attribute' => 'question'])]);
    assertDatabaseCount('questions', 0);
});

<?php

use App\Models\User;
use App\Models\Question;
use function Pest\Laravel\get;
use function Pest\Laravel\actingAs;

it('should list all the question', function () {

    $user = User::factory()->create();
    $questions = Question::factory()->count(5)->create();
    actingAs($user);


    $response = get('dashboard');

    foreach ($questions as $question) {
        $response->assertSee($question->question);
    }
});
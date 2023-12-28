<?php

use App\Models\Question;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\post;

it('should be able to like question', function () {
    $user = User::factory()->create();
    $question = Question::factory()->create();

    actingAs($user);

    post(route('question.like', $question));

    assertDatabaseHas('votes', [
        'user_id' => $user->id,
        'question_id' => $question->id,
        'like' => '1',
        'unlike' => '0',
    ]);
});

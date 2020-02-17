<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DaysBetweenApiTest extends TestCase
{

    /** @test */
    public function must_pass_param_startDateTime_and_endDateTime()
    {
        $response = $this->get('/api/days_between');

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('startDateTime');
        $response->assertJsonValidationErrors('endDateTime');
    }

    /** @test */
    public function must_pass_valid_datetime()
    {
        $response = $this->get('/api/days_between?startDateTime=invalid&endDateTime=invalid');

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('startDateTime');
        $response->assertJsonValidationErrors('endDateTime');
    }

    /** @test */
    public function response_shows_days_between()
    {
        $response = $this->get('/api/days_between?startDateTime=2020-01-01&endDateTime=2020-02-02');

        $response->assertStatus(200);
        $response->assertJson(['data' => [32]]);
    }

    /** @test */
    public function can_only_use_valid_timezones()
    {
        $response = $this->get('/api/days_between?startDateTime=2020-01-01&endDateTime=2020-02-02&startDateTimeZone=invalid');

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('startDateTimeZone');
    }

    /** @test */
    public function can_only_request_valid_result_formats()
    {
        $response = $this->get('/api/days_between?startDateTime=2020-01-01&endDateTime=2020-02-02&resultFormat=invalid');

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('resultFormat');
    }

    /** @test */
    public function response_shows_days_between_as_seconds()
    {
        $response = $this->get('/api/days_between?startDateTime=2020-01-01&endDateTime=2020-02-02&resultFormat=seconds');

        $response->assertStatus(200);
        $response->assertJson(['data' => [2764800]]);
    }

}

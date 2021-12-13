<?php

namespace Tests\Unit\Http\Controllers\Api\V01\Channel;

use App\Models\Chennel;
use Database\Factories\ChennelFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChannelsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_all_channels_must_be_accessible()
    {
        $response = $this->get(route('channel.all'));

        $response->assertStatus(200);
    }

    public function test_new_channel_must_be_validate()
    {
        $response = $this->post(route('channel.create'));

        $response->assertStatus(302);
    }

    public function test_new_channel_must_be_create()
    {
        $channel = Chennel::factory()->create();
        $response = $this->post(route('channel.create'), [
            'name' => $channel->name
        ]);

        $response->assertStatus(201);
    }

    public function test_channel_can_be_update()
    {

    }
}

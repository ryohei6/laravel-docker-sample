<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Item;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_items()
    {
        Item::create(['name' => 'Test 1', 'description' => 'Desc 1']);
        Item::create(['name' => 'Test 2', 'description' => 'Desc 2']);

        $response = $this->get(route('items.index'));
        $response->assertStatus(200);
        $response->assertSee('Test 1');
        $response->assertSee('Test 2');
    }

    public function test_can_create_item()
    {
        $response = $this->post(route('items.store'), [
            'name' => 'New Item',
            'description' => 'New Description',
        ]);

        $response->assertRedirect(route('items.index'));
        $this->assertDatabaseHas('items', ['name' => 'New Item']);
    }

    public function test_can_show_item()
    {
        $item = Item::create(['name' => 'Show Item', 'description' => 'Show Desc']);

        $response = $this->get(route('items.show', $item->id));
        $response->assertStatus(200);
        $response->assertSee('Show Item');
    }

    public function test_can_update_item()
    {
        $item = Item::create(['name' => 'Old Name', 'description' => 'Old Desc']);

        $response = $this->put(route('items.update', $item->id), [
            'name' => 'Updated Name',
            'description' => 'Updated Desc',
        ]);

        $response->assertRedirect(route('items.index'));
        $this->assertDatabaseHas('items', ['name' => 'Updated Name']);
    }

    public function test_can_delete_item()
    {
        $item = Item::create(['name' => 'Delete Me', 'description' => 'Delete Desc']);

        $response = $this->delete(route('items.destroy', $item->id));
        $response->assertRedirect(route('items.index'));
        $this->assertDatabaseMissing('items', ['name' => 'Delete Me']);
    }
}

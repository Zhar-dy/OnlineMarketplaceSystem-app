<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_creates_a_new_category_with_attachment()
    {
        Storage::fake('public');
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $response = $this->post(route('category.store'), [
            'name' => 'Test Category',
            'description' => 'Test Description',
            'attachment' => UploadedFile::fake()->image('test.jpg'),
        ]);

        $response->assertRedirect(route('home'));

        $this->assertDatabaseHas('categories', [
            'name' => 'Test Category',
            'description' => 'Test Description',
            'attachment' => 'Test Category-' . date('Y-m-d') . '.jpg',
        ]);

        Storage::disk('public')->assertExists('category/Test Category-' . date('Y-m-d') . '.jpg');
    }

    public function test_store_creates_a_new_category_without_attachment()
    {
        $response = $this->post(route('category.store'), [
            'name' => 'Test Category',
            'description' => 'Test Description',
        ]);

        $response->assertRedirect(route('home'));

        $this->assertDatabaseHas('categories', [
            'name' => 'Test Category',
            'description' => 'Test Description',
            'attachment' => 'No attachment',
        ]);
    }

    public function test_update_changes_an_existing_category()
    {
        $category = Category::create([
            'name' => 'Old Name',
            'description' => 'Old Description',
            'attachment' => 'No attachment',
        ]);

        $response = $this->put(route('category.update', $category), [
            'name' => 'Updated Name',
            'description' => 'Updated Description',
        ]);

        $response->assertRedirect(route('home'));

        $this->assertDatabaseHas('categories', [
            'name' => 'Updated Name',
            'description' => 'Updated Description',
        ]);
    }

    public function test_destroy_removes_a_category()
    {
        $category = Category::create([
            'name' => 'Test Category',
            'description' => 'Test Description',
            'attachment' => 'No attachment',
        ]);

        $response = $this->delete(route('category.destroy', $category));

        $response->assertRedirect(route('home'));

        $this->assertDatabaseMissing('categories', [
            'name' => 'Test Category',
        ]);
    }

    public function test_show_displays_a_category_with_products()
    {
        $category = Category::create([
            'name' => 'Test Category',
            'description' => 'Test Description',
            'attachment' => 'No attachment',
        ]);

        $response = $this->get(route('category.show', $category));

        $response->assertStatus(200);
        $response->assertViewHas('category', $category);
        $response->assertViewHas('products');
    }

    // this to test search
    public function it_can_index_categories()
    {
        // Create some categories
        Category::factory()->create(['name' => 'Electronics']);
        Category::factory()->create(['name' => 'Books']);

        // Test without search keyword
        $response = $this->get('/categories');
        $response->assertStatus(200);
        $response->assertViewHas('categories');

        // Test with search keyword
        $response = $this->get('/categories?keyword=Electronics');
        $response->assertStatus(200);
        $response->assertViewHas('categories', function ($categories) {
            return $categories->contains('name', 'Electronics');
        });
    }
}

<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PassportController
 */
final class PassportControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $passports = Passport::factory()->count(3)->create();

        $response = $this->get(route('passports.index'));

        $response->assertOk();
        $response->assertViewIs('passport.index');
        $response->assertViewHas('passports');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('passports.create'));

        $response->assertOk();
        $response->assertViewIs('passport.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PassportController::class,
            'store',
            \App\Http\Requests\PassportStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('passports.store'));

        $response->assertRedirect(route('passports.index'));
        $response->assertSessionHas('passport.id', $passport->id);

        $this->assertDatabaseHas(passports, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $passport = Passport::factory()->create();

        $response = $this->get(route('passports.show', $passport));

        $response->assertOk();
        $response->assertViewIs('passport.show');
        $response->assertViewHas('passport');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $passport = Passport::factory()->create();

        $response = $this->get(route('passports.edit', $passport));

        $response->assertOk();
        $response->assertViewIs('passport.edit');
        $response->assertViewHas('passport');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PassportController::class,
            'update',
            \App\Http\Requests\PassportUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $passport = Passport::factory()->create();

        $response = $this->put(route('passports.update', $passport));

        $passport->refresh();

        $response->assertRedirect(route('passports.index'));
        $response->assertSessionHas('passport.id', $passport->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $passport = Passport::factory()->create();

        $response = $this->delete(route('passports.destroy', $passport));

        $response->assertRedirect(route('passports.index'));

        $this->assertSoftDeleted($passport);
    }
}

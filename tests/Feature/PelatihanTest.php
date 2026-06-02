<?php

namespace Tests\Feature;

use App\Models\Mentor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PelatihanTest extends TestCase
{
    use RefreshDatabase;

    private function authHeaders(string $token): array
    {
        return ['Authorization' => 'Bearer ' . $token];
    }

    public function test_admin_can_create_update_and_delete_pelatihan(): void
    {
        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'password',
            'role' => 'admin',
            'api_token' => 'admintoken',
        ]);

        $mentor = Mentor::create([
            'nama' => 'Mentor Satu',
            'email' => 'mentor@example.com',
            'telepon' => '08123456789',
            'keahlian' => 'Teknologi',
        ]);

        $response = $this->withHeaders($this->authHeaders($user->api_token))
            ->postJson('/api/pelatihan', [
                'judul' => 'Pelatihan Laravel',
                'deskripsi' => 'Belajar CRUD Laravel',
                'mentor_id' => $mentor->id,
                'tanggal_mulai' => '2026-06-01',
                'tanggal_selesai' => '2026-06-05',
                'is_active' => true,
            ]);

        $response->assertCreated()
            ->assertJsonPath('data.judul', 'Pelatihan Laravel')
            ->assertJsonPath('data.mentor.id', $mentor->id);

        $pelatihanId = $response->json('data.id');

        $this->withHeaders($this->authHeaders($user->api_token))
            ->putJson("/api/pelatihan/{$pelatihanId}", [
                'judul' => 'Pelatihan Laravel Lanjutan',
                'is_active' => false,
            ])
            ->assertOk()
            ->assertJsonPath('data.judul', 'Pelatihan Laravel Lanjutan')
            ->assertJsonPath('data.is_active', false);

        $this->withHeaders($this->authHeaders($user->api_token))
            ->deleteJson("/api/pelatihan/{$pelatihanId}")
            ->assertNoContent();
    }
}

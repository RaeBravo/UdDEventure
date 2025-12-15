<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\RegisteredPlayer;
use App\Models\Player;

return new class extends Migration
{
    public function up(): void
    {
        // First, make sure the image columns exist
        if (!Schema::hasColumn('players', 'player_image')) {
            Schema::table('players', function (Blueprint $table) {
                $table->longText('player_image')->nullable();
                $table->longText('whiteform_image')->nullable();
            });
        }
        
        // Populate players table with data from registered_players
        $registeredPlayers = RegisteredPlayer::all();
        
        foreach ($registeredPlayers as $rp) {
            Player::updateOrCreate(
                ['student_id' => $rp->student_id, 'event_id' => $rp->event_id],
                [
                    'event_id' => $rp->event_id,
                    'student_id' => $rp->student_id,
                    'name' => $rp->name,
                    'email' => $rp->email,
                    'department' => $rp->department,
                    'age' => $rp->age,
                    'gdrive_link' => $rp->gdrive_link,
                    'team_name' => $rp->team_name,
                    'status' => $rp->status,
                    'player_image' => null,
                    'whiteform_image' => null,
                ]
            );
        }
    }

    public function down(): void
    {
        // Remove all players that were created from registered_players
        Player::whereNotNull('event_id')->delete();
    }
};

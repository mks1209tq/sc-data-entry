<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Passport;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Cert;

class AssignPassportsToUsers extends Command
{
    protected $signature = 'certs:assign {count=10 : Number of certs to assign per user}';
    protected $description = 'Assign unassigned certs to users';

    public function handle()
    {
        $this->info('Starting certs assignment process...');

        $countPerUser = $this->argument('count');

        $users = User::where('is_admin', false)->get();

        if ($users->isEmpty()) {
            $this->error('No non-admin users found in the system.');
            return;
        }

        DB::beginTransaction();

        try {
            foreach ($users as $user) {
                $assignedCount = $this->assignPassportsToUser($user, $countPerUser);
                $this->info("Assigned $assignedCount certs to user ID: " . $user->id);
            }

            DB::commit();
            $this->info('Certs assignment completed successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('An error occurred: ' . $e->getMessage());
            $this->error('Changes have been rolled back.');
        }
    }

    private function assignPassportsToUser(User $user, int $count): int
    {
        $assignedCount = 0;

        $unassignedCerts = Cert::whereNull('user_id')
            // ->where('is_data_entered', false)
            // ->where('is_data_correct', false)
            ->limit($count)
            ->get();

        foreach ($unassignedCerts as $cert) {
            $cert->user_id = $user->id;
            $cert->save();
            $assignedCount++;
        }

        return $assignedCount;
    }
}

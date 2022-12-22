<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserHistory;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function __invoke()
    {
        $orphans = UserHistory::doesntHave('user')->get(['id']);
        if ($orphans->count()) {
            $orphans->toQuery()->delete();
        }
//        dump($orphans->modelKeys());
//        UserHistory::whereIn('id', $orphans->modelKeys())->delete();
//        dump($orphans);


        return 'test';
    }

    private function test()
    {
        User::factory()->count(100)->hasUserHistories(3)->create();
    }
}

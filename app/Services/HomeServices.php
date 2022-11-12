<?php

namespace App\Services;


class HomeServices
{
    public function index()
    {

        $i = 0;
        while (++$i) {
            $teams = HomeServices::retriveRandomTeams();

            if (abs($teams['teamAtotalScore'] - $teams['teamBtotalScore']) <= 0.01) {
                break;
            };
        }

        return ($teams);
    }



    public function retriveRandomTeams()
    {

        $players = json_decode(file_get_contents(storage_path() . "/json/players.json"), true);

        shuffle($players);

        $teamA = array_slice($players, 0, count($players) / 2);
        $teamB = array_slice($players, count($players) / 2);

        $teamATotalScore = 0;

        foreach ($teamA as $player) {

            $teamATotalScore += $player['score'];
        }

        $teamBTotalScore = 0;

        foreach ($teamB as $player) {

            $teamBTotalScore += $player['score'];
        }

        return ($teams[] = [
            'teamA' => $teamA,
            'teamAtotalScore' => $teamATotalScore,
            'teamB' => $teamB,
            'teamBtotalScore' => $teamBTotalScore,
        ]);
    }
}

<?php

namespace Riot;

/**
 * Riot Games Champion Mastery API library.
 *
 * @package Riot
 */
class RiotChampionMastery extends Riot {

  /**
   * Gets all champion mastery entries for a summoner.
   *
   * @param int $summoner_id
   *   The ID of the champion.
   *
   * @return object
   *
   * @see https://developer.riotgames.com/api-methods/#champion-mastery-v3/GET_getAllChampionMasteries
   */
  public function bySummoner($summoner_id) {
    $path_params = [
      'summonerId' => $summoner_id,
    ];

    return $this->request('GET', '/lol/champion-mastery/v3/champion-masteries/by-summoner/{summonerId}', $path_params);
  }

}

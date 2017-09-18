<?php

namespace Riot;

/**
 * Riot Games Summoner API library.
 *
 * @package Riot
 */
class RiotSummoner extends Riot {

  /**
   * Gets a summoner by summoner ID.
   *
   * @param int $summoner_id
   *   The ID of the summoner.
   *
   * @return object
   *
   * @see https://developer.riotgames.com/api-methods/#summoner-v3/GET_getBySummonerId
   */
  public function byId($summoner_id) {
    $path_params = [
      'summonerId' => $summoner_id,
    ];

    return $this->request('GET', '/lol/summoner/v3/summoners/{summonerId}', $path_params);
  }

  /**
   * Gets a summoner by account ID.
   *
   * @param int $account_id
   *   The ID of the summoner account.
   *
   * @return object
   *
   * @see https://developer.riotgames.com/api-methods/#summoner-v3/GET_getByAccountId
   */
  public function byAccountId($account_id) {
    $path_params = [
      'accountId' => $account_id,
    ];

    return $this->request('GET', '/lol/summoner/v3/summoners/by-account/{accountId}', $path_params);
  }

  /**
   * Gets a summoner by summoner name.
   *
   * @param string $summoner_name
   *   The name of the summoner.
   *
   * @return object
   *
   * @see https://developer.riotgames.com/api-methods/#summoner-v3/GET_getBySummonerName
   */
  public function byName($summoner_name) {
    $path_params = [
      'summonerName' => $summoner_name,
    ];

    return $this->request('GET', '/lol/summoner/v3/summoners/by-name/{summonerName}', $path_params);
  }

}

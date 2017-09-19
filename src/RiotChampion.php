<?php

namespace Riot;

/**
 * Riot Games Champion API library.
 *
 * @package Riot
 */
class RiotChampion extends Riot {

  /**
   * Gets all champions.
   *
   * @param bool $free_to_play
   *   Retrieve only free to play champions.
   *
   * @return object
   *
   * @see https://developer.riotgames.com/api-methods/#champion-v3/GET_getChampions
   */
  public function all($free_to_play = FALSE) {
    $query_params = [
      'freeToPlay' => $free_to_play,
    ];

    return $this->request('GET', '/lol/platform/v3/champions', NULL, $query_params);
  }

  /**
   * Gets a champion by champion ID.
   *
   * @param int $champion_id
   *   The ID of the champion.
   *
   * @return object
   *
   * @see https://developer.riotgames.com/api-methods/#champion-v3/GET_getChampionsById
   */
  public function byId($champion_id) {
    $path_params = [
      'id' => $champion_id,
    ];

    return $this->request('GET', '/lol/platform/v3/champions/{id}', $path_params);
  }

}

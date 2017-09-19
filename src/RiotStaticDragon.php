<?php

namespace Riot;

/**
 * Riot Games Static Data API library using Data Dragon.
 *
 * @see https://developer.riotgames.com/static-data.html
 *
 * @package Riot
 */
class RiotStaticDragon extends Riot {

  const CDN_URL = 'http://ddragon.leagueoflegends.com/cdn';

  /**
   * @inheritdoc
   */
  public function __construct($api_key) {
    parent::__construct($api_key);

    // Overwrite API URL with CDN URL.
    $this->api_url = self::CDN_URL;
  }

  /**
   * Gets all champion data.
   *
   * @return array
   *   Associative array of champion objects indexed by ID.
   */
  public function champions() {
    $result = $this->request('GET', '/6.24.1/data/en_US/champion.json');

    if (!empty($result) && isset($result->data)) {
      $champions = [];

      foreach ($result->data as $value) {
        $champions[$value->key] = $value;
      }

      return $champions;
    }
    else {
      return NULL;
    }
  }

}

<?php

namespace Riot;

/**
 * Riot Games Static Data API library.
 *
 * @package Riot
 */
class RiotStatic extends Riot {

  /**
   * Gets all champion data.
   *
   * @return object
   */
  public function champions($data_by_id = FALSE) {
    $query_params = [
      'dataById' => $data_by_id,
    ];

    return $this->request('GET', '/lol/static-data/v3/champions', NULL, $query_params);
  }

}

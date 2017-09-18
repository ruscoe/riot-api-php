<?php

namespace Riot\Tests;

/**
 * Riot Games Summoner API test library.
 *
 * @package Riot\Tests
 */
class RiotSummoner extends \Riot\RiotSummoner {

  /**
   * @inheritdoc
   */
  public function __construct($api_key) {
    $this->api_key = $api_key;
    $this->http_client = new Client();
  }

  /**
   * @inheritdoc
   */
  public function byId($summoner_id) {
    parent::byId($summoner_id);
  }

  /**
   * @inheritdoc
   */
  public function byAccountId($account_id) {
    parent::byAccountId($account_id);
  }

  /**
   * @inheritdoc
   */
  public function byName($summoner_name) {
    parent::byName($summoner_name);
  }

}

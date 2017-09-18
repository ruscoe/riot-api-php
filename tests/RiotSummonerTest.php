<?php

namespace Riot\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Riot Summoner API library tests.
 *
 * @package Riot\Tests
 */
class RiotSummonerTest extends TestCase {

  /**
   * Tests API request URI when getting a summoner by summoner ID.
   */
  public function testById() {
    $summoner_id = '88790059';

    $riot = new RiotSummoner('');
    $riot->byId($summoner_id);

    $this->assertEquals('GET', $riot->getClient()->method);
    $this->assertEquals('https://na1.api.riotgames.com/lol/summoner/v3/summoners/' . $summoner_id, $riot->getClient()->uri);
  }

  /**
   * Tests API request URI when getting a summoner by account ID.
   */
  public function testByAccountId() {
    $account_id = '239976345';

    $riot = new RiotSummoner('');
    $riot->byAccountId($account_id);

    $this->assertEquals('GET', $riot->getClient()->method);
    $this->assertEquals('https://na1.api.riotgames.com/lol/summoner/v3/summoners/by-account/' . $account_id, $riot->getClient()->uri);
  }

  /**
   * Tests API request URI when getting a summoner by summoner name.
   */
  public function testByName() {
    $summoner_name = 'Rogue Stimulant';

    $riot = new RiotSummoner('');
    $riot->byName($summoner_name);

    $this->assertEquals('GET', $riot->getClient()->method);
    $this->assertEquals('https://na1.api.riotgames.com/lol/summoner/v3/summoners/by-name/' . $summoner_name, $riot->getClient()->uri);
  }

}

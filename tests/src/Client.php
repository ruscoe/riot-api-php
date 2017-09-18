<?php

namespace Riot\Tests;

use GuzzleHttp\Psr7\Response;

/**
 * Test HTTP client.
 *
 * @package Riot\Tests
 */
class Client extends \GuzzleHttp\Client {

  public $method;

  public $uri;

  public $options;

  /**
   * Non-functional request function used for testing.
   *
   * Sets request parameters as class properties to be validated by tests.
   */
  public function request($method, $uri = NULL, array $options = []) {
    $this->method = $method;
    $this->uri = $uri;
    $this->options = $options;

    return new Response();
  }

}

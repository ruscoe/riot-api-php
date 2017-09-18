<?php

namespace Riot;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

/**
 * Riot Games API library.
 *
 * @package Riot
 */
class Riot {

  /**
   * The API endpoint.
   *
   * TODO: Allow all regions.
   *
   * @var string $endpoint
   */
  protected $api_url = 'https://na1.api.riotgames.com';

  /**
   * The Riot Games API key to authenticate with.
   *
   * @var string $api_key
   */
  protected $api_key;

  /**
   * The GuzzleHttp client.
   *
   * @var Client $client
   */
  protected $http_client;

  /**
   * Riot constructor.
   *
   * @param string $api_key
   *   The Riot Games API key to use.
   */
  public function __construct($api_key) {
    $this->api_key = $api_key;
    $this->http_client = new Client();
  }

  /**
   * Makes a request to the Riot Games API.
   *
   * @param string $method
   *   The REST method to use when making the API request.
   * @param string $endpoint
   *   The API endpoint for the API request.
   * @param array $path_params
   *   Associative array of path parameters.
   * @param array $query_params
   *   Associative array of query parameters.
   *
   * @return object
   *   Riot Games API response object.
   *
   * @throws RiotException
   */
  public function request($method, $endpoint, $path_params = NULL, $query_params = NULL) {
    $options = [
      'headers' => [
        'X-Riot-Token' => $this->api_key,
      ],
    ];

    if (!empty($query_params)) {
      if ($method == 'GET') {
        // Send parameters in the query string.
        $options['query'] = $query_params;
      }
      else {
        // Send parameters as JSON in request body.
        $options['json'] = (object) $query_params;
      }
    }

    if (!empty($path_params)) {
      foreach ($path_params as $key => $value) {
        $endpoint = str_replace('{' . $key . '}', $value, $endpoint);
      }
    }

    try {
      $uri = $this->api_url . $endpoint;
      $response = $this->http_client->request($method, $uri, $options);
      $data = json_decode($response->getBody());
      return $data;
    }
    catch (RequestException $e) {
      $response = $e->getResponse();
      if (!empty($response)) {
        $message = $e->getResponse()->getBody();
      }
      else {
        $message = $e->getMessage();
      }
      throw new RiotException($message, $e->getCode(), $e);
    }
  }

  /**
   * Gets the HTTP client.
   *
   * @return \GuzzleHttp\Client
   *   The Guzzle HTTP client.
   */
  public function getClient() {
    return $this->http_client;
  }

}

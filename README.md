# PHP library for the Riot Games API

## Structure

Each component of the Riot Games API is separated into its own class. This helps
with readability and is easy to extend whenever new components are added.

## Examples

### To retrieve summoner information

```php
$summoner_api = new RiotSummoner($your_api_key);
$summoner = $summoner_api->byName('Rogue Stimulant');
```

The returned object:

```php
stdClass Object
(
    [id] => 88790059
    [accountId] => 239976345
    [name] => Rogue Stimulant
    [profileIconId] => 20
    [revisionDate] => 1505756776000
    [summonerLevel] => 16
)
```

### To retrieve champion information

```php
  $champion_api = new RiotChampion($your_api_key);
  $champion = $champion_api->byId(22);
```

```php
stdClass Object
(
    [id] => 22
    [active] => 1
    [botEnabled] => 1
    [freeToPlay] =>
    [botMmEnabled] => 1
    [rankedPlayEnabled] => 1
)
```

### To retrieve static data, such as champion information

```php
  $riot_static_api = new RiotStatic($your_api_key);
  $champions = $riot_static_api->champions();
```

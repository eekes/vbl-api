# VBL API

![Testing](https://github.com/eekes/vbl-api/workflows/Tests/badge.svg) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/eekes/vbl-api/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/eekes/vbl-api/?branch=master)

PHP wrapper for the [VBL (Basketbal Vlaanderen) API](https://www.basketbal.vlaanderen/faq/categorie/api) to get all data as nice objects, making
it much easier to use on you club's website.

## Usage

Install using composer:

```
composer require eekes/vbl-api
```

Then use any of these static methods: 

```php
use Eekes\VblApi\Api\GamesApi;
use Eekes\VblApi\Api\MembersApi;
use Eekes\VblApi\Api\ClubApi;
use Eekes\VblApi\Api\TeamApi;

$gamesByTeamId = GamesApi::byTeamId("xxx");
$gamesByClubId = GamesApi::byClubId("xxx");

$members = MembersApi::byClubId("xxx");

$club = ClubApi::byId("xxx");

$team = TeamApi::byId("xxx");
```

Every method uses return types (combined with type-hinted annotations if needed) so each response should be self-explanatory 
and add auto-completion in your IDE.

## Contributing and testing

If you see improvements or bugs, feel free to contribute! 

Provisioning for local development is provided. You can simply run `vagrant up` and run tests within the `/vagrant` 
directory by running: `./vendor/bin/phpunit`.

You'll need to provide these env values in order for the tests to work:

```
CLUB_ID=club_id
TEAM_ID="team_id"
```
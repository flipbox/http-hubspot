<?php

namespace Flipbox\HubSpot\Http\Tests\Resources;

use Flipbox\HubSpot\Http\Resources\Contacts;
use GuzzleHttp\Client;

class ContactsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Contacts
     */
    private $contacts;

    /**
     * Setup tests
     */
    public function setUp()
    {
        parent::setUp();
        $this->contacts = new Contacts();
        sleep(1);
    }

    /**
     * @return Client
     */
    private function createClient()
    {

        $config['base_uri'] = 'https://api.hubapi.com/';

        // Add API Key to query
        $config['query']['hapikey'] = 'demo';

        return new Client($config);

    }

    /**
     * @return \stdClass
     */
    private function createContact()
    {
        sleep(1);

        $client = $this->createClient();

        $response = $this->contacts->create($client, [
            ['property' => 'email', 'value' => 'test' . uniqid() . '@hubspot.com'],
            ['property' => 'firstname', 'value' => 'Test'],
            ['property' => 'lastname', 'value' => 'User'],
        ]);

        $this->assertEquals(200, $response->getStatusCode());

        return \GuzzleHttp\json_decode(
            $response->getBody()->getContents()
        );

    }

    /** @test */
    public function getById()
    {
        $contact = $this->createContact();

        $client = $this->createClient();

        $response = $this->contacts->getById(
            $client,
            $contact->vid
        );

        $this->assertEquals(200, $response->getStatusCode());

    }
}

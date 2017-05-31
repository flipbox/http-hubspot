<?php

namespace Flipbox\HubSpot\Http\Resources;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class Contacts extends AbstractResource
{

    use Traits\V1;

    /**
     * The resource name
     */
    const RESOURCE = 'contacts';

    /**
     * @see https://developers.hubspot.com/docs/methods/contacts/create_contact
     *
     * @param Client $client
     * @param array $properties
     * @return ResponseInterface
     */
    public function create(Client $client, array $properties): ResponseInterface
    {
        $options = [];
        $options['json'] = ['properties' => $properties];

        return $client->post(
            $this->assembleEndpoint("contact"),
            $options
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/contacts/update_contact
     *
     * @param Client $client
     * @param int $id
     * @param array $properties
     * @return ResponseInterface
     */
    public function update(Client $client, int $id, array $properties): ResponseInterface
    {
        $options = [];
        $options['json'] = ['properties' => $properties];

        return $client->post(
            $this->assembleEndpoint("contact/vid/{$id}/profile"),
            $options
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/contacts/update_contact-by-email
     *
     * @param Client $client
     * @param string $email
     * @param array $properties
     * @return ResponseInterface
     */
    public function updateByEmail(Client $client, string $email, array $properties): ResponseInterface
    {
        $options = [];
        $options['json'] = ['properties' => $properties];

        return $client->post(
            $this->assembleEndpoint("contact/email/{$email}/profile"),
            $options
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/contacts/create_or_update
     *
     * @param Client $client
     * @param string $email
     * @param array $properties
     * @return ResponseInterface
     */
    public function upsert(Client $client, string $email, array $properties = []): ResponseInterface
    {
        $options = [];
        $options['json'] = ['properties' => $properties];

        return $client->post(
            $this->assembleEndpoint("contact/createOrUpdate/email/{$email}"),
            $options
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/contacts/batch_create_or_update
     *
     * @param Client $client
     * @param array $contacts
     * @return ResponseInterface
     */
    public function upsertBatch(Client $client, array $contacts): ResponseInterface
    {
        $options = [];
        $options['json'] = $contacts;

        return $client->post(
            $this->assembleEndpoint("contact/batch"),
            $options
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/contacts/delete_contact
     *
     * @param Client $client
     * @param int $id
     * @return ResponseInterface
     */
    public function delete(Client $client, int $id): ResponseInterface
    {
        return $client->delete(
            $this->assembleEndpoint("contact/vid/{$id}")
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/contacts/get_contacts
     *
     * @param Client $client
     * @param array $params
     * @return ResponseInterface
     */
    public function all(Client $client, array $params = []): ResponseInterface
    {
        return $client->get(
            $this->assembleEndpoint("lists/all/contacts/all", $params)
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/contacts/get_recently_updated_contacts
     *
     * @param Client $client
     * @param array $params Array of optional parameters ['count', 'offset']
     * @return ResponseInterface
     */
    public function getRecentlyModified(Client $client, array $params = []): ResponseInterface
    {
        return $client->get(
            $this->assembleEndpoint("lists/recently_updated/contacts/recent", $params)
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/contacts/get_recently_created_contacts
     *
     * @param Client $client
     * @param array $params Array of optional parameters ['count', 'offset']
     * @return ResponseInterface
     */
    public function getRecentlyCreated(Client $client, array $params = []): ResponseInterface
    {
        return $client->get(
            $this->assembleEndpoint("lists/all/contacts/recent", $params)
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/contacts/get_contact
     *
     * @param int $id
     * @param Client $client
     * @return ResponseInterface
     */
    public function getById(Client $client, int $id): ResponseInterface
    {
        return $client->get(
            $this->assembleEndpoint("contact/vid/{$id}/profile")
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/contacts/get_batch_by_vid
     *
     * @param Client $client
     * @param array $ids
     * @param array $params
     * @return ResponseInterface
     */
    public function getBatchByIds(Client $client, array $ids, array $params = []): ResponseInterface
    {
        $params['vid'] = $ids;

        return $client->get(
            $this->assembleEndpoint("contact/vids/batch", $params)
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/contacts/get_contact_by_email
     *
     * @param Client $client
     * @param string $email
     * @return ResponseInterface
     */
    public function getByEmail(Client $client, string $email): ResponseInterface
    {
        return $client->get(
            $this->assembleEndpoint("contact/email/{$email}/profile")
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/contacts/get_batch_by_email
     *
     * @param Client $client
     * @param array $emails
     * @param array $params
     * @return ResponseInterface
     */
    public function getBatchByEmails(Client $client, array $emails, array $params = []): ResponseInterface
    {
        $params['email'] = $emails;

        return $client->get(
            $this->assembleEndpoint("contact/emails/batch", $params)
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/contacts/get_contact_by_utk
     *
     * @param Client $client
     * @param string $utk
     * @return ResponseInterface
     */
    public function getByToken(Client $client, string $utk)
    {
        return $client->get(
            $this->assembleEndpoint("contact/utk/{$utk}/profile")
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/contacts/search_contacts
     *
     * @param Client $client
     * @param string $query
     * @param array $params ['count', 'offset']
     * @return ResponseInterface
     */
    public function search(Client $client, string $query, array $params = []): ResponseInterface
    {
        $params['q'] = $query;

        return $client->get(
            $this->assembleEndpoint("search/query", $params)
        );
    }
}

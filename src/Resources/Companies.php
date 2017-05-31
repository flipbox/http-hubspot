<?php

namespace Flipbox\HubSpot\Http\Resources;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class Companies extends AbstractResource
{

    use Traits\V2;

    /**
     * @see https://developers.hubspot.com/docs/methods/companies/create_company
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
            $this->assembleEndpoint("companies"),
            $options
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/companies/update_company
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

        return $client->put(
            $this->assembleEndpoint("companies/{$id}"),
            $options
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/companies/delete_company
     *
     * @param Client $client
     * @param int $id
     * @return ResponseInterface
     */
    public function delete(Client $client, int $id): ResponseInterface
    {
        return $client->delete(
            $this->assembleEndpoint("companies/{$id}")
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/companies/get-all-companies
     *
     * @param Client $client
     * @param array $params
     * @return ResponseInterface
     */
    public function all(Client $client, array $params = []): ResponseInterface
    {
        return $client->get(
            $this->assembleEndpoint("companies/paged", $params)
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/companies/get_companies_modified
     *
     * @param Client $client
     * @param array $params Array of optional parameters ['count', 'offset']
     * @return ResponseInterface
     */
    public function getRecentlyModified(Client $client, array $params = []): ResponseInterface
    {
        return $client->get(
            $this->assembleEndpoint("companies/recent/modified", $params)
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/companies/get_companies_created
     *
     * @param Client $client
     * @param array $params Array of optional parameters ['count', 'offset']
     * @return ResponseInterface
     */
    public function getRecentlyCreated(Client $client, array $params = []): ResponseInterface
    {
        return $client->get(
            $this->assembleEndpoint("companies/recent/created", $params)
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/companies/get_companies_by_domain
     *
     * @param Client $client
     * @param string $domain
     * @return ResponseInterface
     */
    public function getByDomain(Client $client, string $domain): ResponseInterface
    {
        return $client->get(
            $this->assembleEndpoint("companies/domain/{$domain}")
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/companies/get_company
     *
     * @param Client $client
     * @param int $id
     * @return ResponseInterface
     */
    public function getById(Client $client, int $id): ResponseInterface
    {
        return $client->get(
            $this->assembleEndpoint("companies/{$id}")
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/companies/add_contact_to_company
     *
     * @param Client $client
     * @param int $contactId
     * @param int $companyId
     * @return ResponseInterface
     */
    public function addContact(Client $client, int $contactId, int $companyId): ResponseInterface
    {
        return $client->put(
            $this->assembleEndpoint("companies/{$companyId}/contacts/{$contactId}")
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/companies/get_company_contacts
     *
     * @param Client $client
     * @param int $companyId
     * @param array $params
     * @return ResponseInterface
     */
    public function getAssociatedContacts(Client $client, int $companyId, array $params = []): ResponseInterface
    {
        return $client->get(
            $this->assembleEndpoint("companies/{$companyId}/contacts", $params)
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/companies/get_company_contacts_by_id
     *
     * @param Client $client
     * @param int $companyId
     * @param array $params
     * @return ResponseInterface
     */
    public function getAssociatedContactIds(Client $client, int $companyId, array $params = []): ResponseInterface
    {
        return $client->get(
            $this->assembleEndpoint("companies/{$companyId}/vids", $params)
        );
    }

    /**
     * @see https://developers.hubspot.com/docs/methods/companies/remove_contact_from_company
     *
     * @param Client $client
     * @param int $contactId
     * @param int $companyId
     * @return ResponseInterface
     */
    public function removeContact(Client $client, int $contactId, int $companyId): ResponseInterface
    {
        return $client->delete(
            $this->assembleEndpoint("companies/{$companyId}/contacts/{$contactId}")
        );
    }
}

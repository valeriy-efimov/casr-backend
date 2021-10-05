<?php

declare(strict_types=1);

namespace App\Repositories\Client;

use App\Models\Client\Client;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ClientRepository implements ClientRepositoryInterface
{

    /**
     * @param \App\Repositories\Client\SearchClientModel $model
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search(SearchClientModel $model): LengthAwarePaginator
    {
        $client = Client::query();
        $page   = $model->getPage();
        $status = $model->getStatus();
        $sort   = $model->getSort();
        $order  = $model->getOrder();

        $whereClient = array_filter(
            [
                'client_name' => $model->getClientName(),
                'address1'    => $model->getAddress1(),
                'address2'    => $model->getAddress2(),
                'city'        => $model->getCity(),
                'state'       => $model->getState(),
                'country'     => $model->getCountry(),
                'phone_no1'   => $model->getPhoneNo1(),
                'phone_no2'   => $model->getPhoneNo2(),
                'zip'         => $model->getZipCode(),
            ]
        );
        foreach ($whereClient as $field => $value) {
            $client->where($field, 'LIKE', ['%' . $value . '%']);
        }

        if ($status) {
            $client->where('status', $status->getValue());
        }

        if ($sort) {
            $client->orderBy($sort->getName(), $order);
        }

        return $client
            ->forPage($page)->paginate(10);
    }
}

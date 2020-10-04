<?php

namespace App\Services;

use App\Models\Booking;

class BookingService
{
    /**
     * @param int $page
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getListQuery($page = 1, $limit = 15)
    {
        $query = Booking::query();

        return $query->forPage($page, $limit);
    }

    public function getListCount()
    {
        $query = $this->getListQuery()->toBase();

        return $query->getCountForPagination();
    }
}

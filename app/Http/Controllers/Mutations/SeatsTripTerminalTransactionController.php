<?php

namespace App\Http\Controllers\Mutations;

use Illuminate\Http\Request;
use App\Repository\Eloquent\Controllers\SeatsTripTerminalTransactionRepository;

class SeatsTripTerminalTransactionController
{
    private $seatsTripTerminalTransactionRepository;

    public function __construct(SeatsTripTerminalTransactionRepository $seatsTripTerminalTransactionRepository)
    {
        $this->seatsTripTerminalTransactionRepository = $seatsTripTerminalTransactionRepository;
    }

    public function create(Request $req) 
    {
        return $this->seatsTripTerminalTransactionRepository->create($req);
    }

}

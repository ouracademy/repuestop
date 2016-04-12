<?php

namespace App\Domain\Services;

use App\Entities\Account;
use App\Entities\Order;
use App\Entities\Transference;
use Validator;
use App\Repository\TransferenceRepository;

class TransferenceDomainService {
    public $repository;
    public function __construct(TransferenceRepository $repository) {
        $this->repository = $repository;
    }

    public  function execute(Account $to, Account $from,$quantity,Order $order) {
        $amountDisponible = $from->getQuantity()->getAmount();
        $dataToValidate = array(
            'quantityToSubstract' => $quantity->getAmount(),
            'to' => $to->getId(),
            'from' => $from->getId(),
        );
        $validator = Validator::make($dataToValidate, [
                    'quantityToSubstract' => 'numeric|max:' . $amountDisponible,
                    'to' => 'exists:App\Entities\Account,id',
                    'from' => 'exists:App\Entities\Account,id'
        ]);
        if ($validator->fails()) {
            return $validator->getMessageBag()->toJson();
        }
        
        $from->substract($quantity->getAmount());
        $to->add($quantity->getAmount());
        $this->repository->store(new Transference($from, $to, $quantity,$order));  
    }

}

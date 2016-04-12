<?php

namespace App\Application;

use App\Entities\Person;
use App\Entities\Company;
use App\Entities\RoleType;
use App\Entities\Order;
use App\Entities\LineOrder;
use App\Repository\OrderRepository;
use App\Repository\InstrumentRepository;
use App\Repository\PartyRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Serializables\Order as Output;
use App\Util\Date;

class ToListOrderService {

    private $orderRepository;
    private $partyRepository;
    private $instrumentRepository;
    private $em;

    public function __construct(
          OrderRepository $repository, 
          PartyRepository $partyRepository, 
          InstrumentRepository $instrumentRepository, 
          EntityManagerInterface $em
    ) {
        $this->em = $em;
        $this->instrumentRepository = $instrumentRepository;
        $this->partyRepository = $partyRepository;
        $this->orderRepository = $repository;
    }

    public function findAll() {
        $response = array();
        $orders = $this->orderRepository->findAll();
        foreach ($orders as $order) {
            $data = new Output(
                    $order->getParty()->getName(), $order->getTimeCharged(), null, $order->getStatus()
            );
            array_push($response, $data->serialize());
        }
        return json_encode($response);
    }
    public function digestInput(){
        
    }

    public function create() {
        //Si es cliente nuevo registralo de dos formas :
        $party = new Person("diana", "quintanilla", "48448479");
        $company = new Company("Repuestop", "01204452211");
        $roleType = new RoleType("customer");
        $entity = new Entity("Sales", "Area about the sales and customer");
        $entityRole = new EntityRole($party, $roleType, $entity);
    }

    public function saveOrder($partyId, $typeOrder, $orderLines) {
        $party = $this->partyRepository->find($partyId);

        $order = new Order(Date::now(), null, $party, 'Created');
        foreach ($orderLines as $orderLine) {
            $instrument = $this->instrumentRepository->find($orderLine->product);
            $order->addLineOrder(new LineOrder($instrument, $orderLine->quantity, $typeOrder));
        }
        $this->em->persist($order);
        $this->em->flush();
    }

    public function executeOrder(Order $order) {
        $partyReceiver = $order->getParty();
        $partyProvider = $this->getPartyProvider();
        $lines = $order->getOrderLinesByStatus('Created');
        $results = array();
        foreach ($lines as $line) {
            $to = $partyReceiver->getAccount($line->getInsrument());
            $from = $partyProvider->getAccount($line->getInstrument());
            $quantity = new Quantity($line->getAmount(), $this->getUnit());
            $result = TransferenceService::executeTransference($from, $to, $quantity, $order);
            array_push($results, $result);
        }
        return $results;
    }

    public function getUnit() {
        $this->unitRepository->findByName('Unidad');
    }

    public function getPartyProvider() {
        return $this->partyRepository->getHouseProvider();
    }

}

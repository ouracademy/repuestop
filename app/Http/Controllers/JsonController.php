<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\OrderRepository;
use App\Repository\ProductRepository;
use App\Repository\PartyRepository ;




use App\Entities\Order;
use App\Entities\Party;
use App\Entities\Item;
use App\Entities\LineOrder;


class JsonController extends Controller
{
    private $orderRepository;
    private $productRepository;
    private $partyRepository;
    public function __construct(OrderRepository $orderRepository,
            ProductRepository $productRepository,
            PartyRepository $partyRepository,
            EntityManagerInterface $em)
    {
        $this->partyRepository= $partyRepository;
        $this->em = $em;
        $this->orderRepository=$orderRepository;
        $this->productRepository=$productRepository;

    }
    public function index()
    {
        $order = new Order();
        $current=$order->getCurrentStatus();
        $order->changeStatus(new Status('Started'));
        
        $order->getAttributes();
        /*por cad atributo me diga su tipo y mostarlo 
         * 
         * 
         */
        dd($this->partyRepository->getAll()
                );
       return  DB::table('product')
            ->join('measurement', 'product.measurement_id', '=', 'measurement.id')
            ->get();
    }
    public function store(Request $request)
    {
         $objects=json_decode($request->input('data'));
         
         $party= new Party('Arthur');
         $order = new Order(new \DateTime(date('Y-m-d H:i:s')),null,$party);
         foreach($objects as $object){
             $product=new Item($object->name,10);
             $quantity= $object->quantity;
             $lineOrder= new LineOrder($product,$quantity);
             $order->addLineOrder($lineOrder);
         }
    }
    public function create(){
        
        
        
        
        
        /*
        $json = '{ "total": 100,
                   "data": [
                              {"id":2,"name": "12", "quantity": 10 },
                              {"id":3,"name": "13", "quantity": 11 },
                              {"id":4,"name": "14", "quantity": 12 }
                            ]
                          }';
         $objects=json_decode($json);
         $products=array();
         foreach($objects->data as $object){
             array_push($products,$this->productRepository->find($object->id)); 
         }
         foreach($products as $product){
             //dd($product->getMeasurement()->getExterior());
         }*/
       /*
            $json = '{ "total": 100,
                          "data": [
                              {"name": "12", "quantity": 10 },
                              {"name": "13", "quantity": 11 },
                              {"name": "14", "quantity": 12 }
                            ]
                          }';
           $objects= json_decode($json);
          // dd($objects);
           $party= new Party('Arthur 6');
           $this->em->persist($party);
           $this->em->flush();
           
           $order = new Order(new \DateTime(date('Y-m-d H:i:s')),null,$party);
           foreach($objects->data as $object){
              // dd($object);
                 $item = new Item($object->name,10);
                 //dd($product);
                 $quantity= $object->quantity;
                 $lineOrder= new LineOrder($item,$quantity);
                 $order->addLineOrder($lineOrder);
            }
            
            $this->em->persist($order);
            $this->em->flush();
            dd($order);
       
*/
    }
}

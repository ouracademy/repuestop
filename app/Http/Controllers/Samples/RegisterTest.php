<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entities\samples\User;
use Storage;
use Doctrine\ORM\EntityManagerInterface;

use App\Domain\MakeClass;

class RegisterTest extends Controller
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:App\Entities\samples\User,email',
            'password' => 'required|confirmed|min:6',
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $user= new User($name,$email,$password);  
        $this->em->persist($user);
        $this->em->flush();
    }
    public function index(){
         /*
         $user= new User('admin','admin@repuestop.com','123123');
         $this->em->persist($user);
         $this->em->flush();
         dd($user);
         */
         
        // printf("%s <br> %d",'hol ',4);
         
        $maketor= new MakeClass;
        $method=$maketor->putMethod('name');
        $file = fopen(storage_path().'/app/file.txt', 'w');
        //dd($file);
        
        fprintf($file, '%d\n', 10.1);
        fprintf($file, '%d', 10.1);
        
        //return $method;
       // Storage::disk('local')->put('test1.php', printf("%s <br> %d",'hol ',4));
      //  Storage::copy('', 'new/file1.jpg');
         
    }
         

}

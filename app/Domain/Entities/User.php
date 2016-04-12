<?php namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;

 
/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @ORM\HasLifecycleCallbacks()
 */
class User implements \LaravelDoctrine\ORM\Contracts\Auth\Authenticatable {
    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer", unique=true, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
     protected $id;
 
     /**
     * @ORM\Column(type="string")
     */
     public $name;
    
     /**
     * @ORM\Column(type="string",unique=true)
     */
     protected $email;
    
 
     /**
     * @ORM\Column(type="string", length=60)
     */
     protected $password;
     
     
    /**
     * @ORM\Column(name="remember_token", type="string", nullable=true)
     */
    protected $rememberToken;
    
     /**
     * @ORM\Column(name="created_at",type="datetime")
     */
     protected $createdAt;
    
     /**
     * @ORM\Column(name="updated_at",type="datetime")
     */
     protected $updatedAt;
    
    

    public function __construct($name,$email,$password)
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword( bcrypt($password));
        $this->createdAt= new \DateTime(date('Y-m-d H:i:s'));
        $this->updatedAt= new \DateTime(date('Y-m-d H:i:s'));
    }
 
    public function getId()
    {
        return $this->id;
    }
 
    public function getName()
    {
        return $this->name;
    }
 
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function setEmail($email)
    {
        $this->email=$email;
    }
 
    public function getEmail()
    {
        return $this->email;
    }
 
   
    
     /**
     * Get the column name for the primary key
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Get the unique identifier for the user.
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        $name = $this->getAuthIdentifierName();

        return $this->{$name};
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get the password for the user.
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->getPassword();
    }

    /**
     * Get the token value for the "remember me" session.
     * @return string
     */
    public function getRememberToken()
    {
        return $this->rememberToken;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param string $value
     *
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->rememberToken = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'rememberToken';
    }
    
    



}
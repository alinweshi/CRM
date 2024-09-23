<?php
Namespace Crm\base\Repositories;
use Crm\base\requests\CreateRequest;
use Crm\Customer\Models\customer;
use Crm\Customer\Events\customerCreation;
use  Crm\base\Repositories\BaseRepository;

class customerRepository extends BaseRepository
{
    public function __construct(private customer $customer){
        $this->setModel($customer);
     }
     public function getcustomer(): customer
     {
         return $this->customer;
     }
      public function setcustomer(customer $customer): void
     {
         $this->customer = $customer;
     }
    public function all(){
        return $this->customer->all();
    }
    public function create(array $data){
            $this->customer->create($data);
        event(new customerCreation($this->customer->create($data)));
    }
    public function show($id){
        return $this->customer->find($id);
    }
    public function update($id,array $data){
        return $this->customer->where('id',$id)->update($data);
    }
    public function destroy($id){
        return $this->customer->destroy($id);
    }
}

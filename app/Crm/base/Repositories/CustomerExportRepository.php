<?php
Namespace Crm\base\Repositories;
use Crm\base\Repositories\CustomerRepository;
use Crm\base\Repositories\AbstractExportRepository;

 class CustomerExportRepository extends AbstractExportRepository{
    public function __construct(private CustomerRepository $customerRepository){}
    public function all(){
        return $this->customerRepository->all();//return all customers data
    }


}
<?php

Namespace Crm\Customer\Services\ExportServices;
use Exception;
use Crm\base\interfaces\ExportRepositoryInterface;
use App\Exceptions\InvalidExportFormat;
use Crm\base\Repositories\CustomerExportRepository;

class CustomerExportService {
    public function __construct(private CustomerExportRepository $CustomerExportRepository){
    }
public function export($format){
    $customers=$this->CustomerExportRepository->all()->toArray();//return all customers data
    $handler= config("export.exporters")[$format]??null;

    if(!$handler){
        throw new Exception(sprintf("Export format not found"));
    }
    $exporter=new  $handler;
    $exporter->export($customers);
    }

}


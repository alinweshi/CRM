<?php

Namespace Crm\Customer\Services\ExportServices;
use Crm\base\interfaces\ExportRepositoryInterface;
class ExcelExport implements ExportRepositoryInterface{
    public function export(array $data){
        dd("excel format");
    }
}
<?php
Namespace Crm\base\Repositories;
use Illuminate\Cache\Repository;
use Illuminate\Database\Eloquent\Model;
use Crm\base\interfaces\ExportRepositoryInterface;

abstract class AbstractExportRepository implements ExportRepositoryInterface{
    public function __construct(private Model $model){}

public function export(array $data){
        return $this->model->all();
    } 

}
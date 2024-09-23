<?php
Namespace Crm\base\Repositories;
use Illuminate\Database\Eloquent\Model;


abstract class BaseRepository implements RepositoryInterface{

    public function __construct(private Model $model){
        //
    }
    public function getModel(){
        return $this->model;
    }
    public function setModel(Model $model){
    $this->model = $model;
    }
    
    public function all(){
        return $this->model->all();
    }


    public function create(array $data){
        return $this->model->create($data);
    }

    public function show($id){
        return $this->model->find($id);
    }
    public function update($id,array $data){
        return $this->model->where('id',$id)->update($data);
        }

    public function destroy($id){
        return $this->model->destroy($id);
    }

}





<?php 
Namespace Crm\base\Repositories;
interface RepositoryInterface{
    public function all();
    public function show($id);
    public function create(array $data);
    public function update($id, array $data);
    public function destroy($id);
}
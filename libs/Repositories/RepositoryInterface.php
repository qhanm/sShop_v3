<?php
namespace Libs\Repositories;

interface RepositoryInterface
{
    public function all(array $options = [], array $params = []);

    public function one($id, array $options = []);

    public function findOrFail($id, array $options = []);

    public function update($id, array $data);

    public function create(array $data);

    public function delete($id, array $options = []); // soft delete

    public function destroy($id, array $options = []);
}

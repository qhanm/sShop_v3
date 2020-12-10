<?php
namespace App\Models\Traits;

trait HasPermission
{
    public function assignPermission($ids)
    {
        if(is_string($ids)) $ids = [$ids];

        $prepareData = [];
        foreach ($ids as $id){
            $prepareData[] = [
                'role_id' => $this->id,
                'permission_id' => $id,
            ];
        }

        return self::query()->insert($prepareData) ? true : false;
    }

    public function revokePermission($ids)
    {
        if(is_string($ids)) $ids = [$ids];
        return self::query()->where('role_id', $this->id)->whereIn('permission_id', $ids)->delete() ? true : false;
    }
}

<?php

namespace App\Repository\Eloquent\Mutations;

use Illuminate\Support\Arr;
use App\SchoolTripSchedule;
use App\Exceptions\CustomException;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Mutations\SchoolTripScheduleRepositoryInterface;

class SchoolTripScheduleRepository extends BaseRepository implements SchoolTripScheduleRepositoryInterface
{
    public function __construct(SchoolTripSchedule $model)
    {
        parent::__construct($model);
    }
    
    public function reschedule(array $args)
    {
        try {
            $input = Arr::except($args, ['directive']);
            $input['days'] = json_encode($input['days']);
            
            return $this->model->upsert($input, ['days']);
        } catch(\Exception $e) {
            throw new CustomException(__('lang.create_schedule_failed').$e->getMessage());
        }
    }
}

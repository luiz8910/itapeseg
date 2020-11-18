<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\seg_brand_choosesRepository;
use App\Models\SegBrandChooses;
use App\Validators\SegBrandChoosesValidator;

/**
 * Class SegBrandChoosesRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SegBrandChoosesRepositoryEloquent extends BaseRepository implements SegBrandChoosesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SegBrandChooses::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

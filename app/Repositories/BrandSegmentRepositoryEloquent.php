<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Brand_SegmentRepository;
use App\Models\BrandSegment;
use App\Validators\BrandSegmentValidator;

/**
 * Class BrandSegmentRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BrandSegmentRepositoryEloquent extends BaseRepository implements BrandSegmentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BrandSegment::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

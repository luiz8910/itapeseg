<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\sub_cat_chooseRepository;
use App\Models\SubCatChoose;
use App\Validators\SubCatChooseValidator;

/**
 * Class SubCatChooseRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SubCatChooseRepositoryEloquent extends BaseRepository implements SubCatChooseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SubCatChoose::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

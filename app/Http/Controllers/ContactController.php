<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Repositories\ContactRepository;
use App\Repositories\UserRepository;
use App\Traits\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    use Config;
    /**
     * @var ContactRepository
     */
    private $repository;
    /**
     * @var UserRepository
     */
    private $users;

    public function __construct(ContactRepository $repository, UserRepository $users)
    {
        $this->repository = $repository;
        $this->users = $users;
    }

    public function index()
    {
        $contacts = $this->repository->orderBy('created_at')->paginate(10);

        $route = 'contact.index';

        return view('index', compact('route', 'contacts'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        DB::beginTransaction();

        try {

            $this->repository->create($data);

            if($data['phone'] == "")
                $data['phone'] = false;

            else
                $data['raw_phone'] = $this->raw_phone($data['phone']);

            $user = $this->users->findByField('id', 1)->first();

            Mail::to($user)->cc('luiz.sanches8910@gmail.com')->send(new Contact($data));

            DB::commit();

            return json_encode(['status' => true]);

        }catch (\Exception $e){
            DB::rollBack();

            dd($e->getMessage());

            return json_encode(['status' => false, 'msg' => 'Um erro ocorreu, tente novamente mais tarde']);
        }
    }
}

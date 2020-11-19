<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Repositories\CompanyDataRepository;
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
    /**
     * @var CompanyDataRepository
     */
    private $data;

    public function __construct(ContactRepository $repository, UserRepository $users, CompanyDataRepository $data)
    {
        $this->repository = $repository;
        $this->users = $users;
        $this->data = $data;
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

            return json_encode(['status' => false, 'msg' => 'Um erro ocorreu, tente novamente mais tarde']);
        }
    }

    public function company_data()
    {
        $links[] = '../../assets/lib/summernote/summernote.css';

        $scripts[] = '../../assets/lib/summernote/summernote.min.js';
        $scripts[] = '../../assets/lib/summernote/summernote-ext-beagle.js';
        $scripts[] = '../../assets/lib/bootstrap-markdown/js/bootstrap-markdown.js';
        $scripts[] = '../../assets/lib/markdown-js/markdown.js';
        $scripts[] = '../../assets/js/app-form-wysiwyg.js';
        $scripts[] = '../../js/mask.js';

        $route = 'data.company_data';

        $data = $this->data->findByField('id', 1)->first();

        return view('index', compact('data', 'route', 'scripts', 'links'));
    }

    public function company_data_update(Request $request)
    {
        $data = $request->all();

        DB::beginTransaction();

        try {
            $file = $request->file('file');

            if($file)
            {
                $path = $file->store('public/uploads');

                $data['picture'] = $path;
            }

            $this->data->update($data, 1);

            DB::commit();

            $request->session()->flash('success.msg', 'As informações foram salvas');

        }catch (\Exception $e){
            DB::rollBack();

            $request->session()->flash('error.msg', 'Um erro ocorreu');
        }

        return redirect()->back();
    }
}

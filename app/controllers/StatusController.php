<?php


use app\forms\PublishStatusForm;
use Laracasts\Commander\CommanderTrait;

class StatusController extends \BaseController {
    protected $statusRepository;
    /**
     * @var PublishStatusForm
     */
    protected $publishStatusForm;
    use CommanderTrait;

    /**
     * @param PublishStatusForm $publishStatusForm
     * @param StatusRepository $statusRepository
     */
    function __construct(PublishStatusForm $publishStatusForm, StatusRepository $statusRepository)
    {
        $this->publishStatusForm = $publishStatusForm;
        $this->statusRepository = $statusRepository;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//returns the index view
        $statuses = $this->statusRepository->getAllForUser();

        return view::make('statuses.index', compact('statuses'));
	}

    public function store()
    {
        $input = Input::all();
        $userId = Sentry::getUser()->getId();
        $input['userId'] = $userId;
        $this->publishStatusForm->validate($input);

        $this->execute(PublishStatusCommand::class, $input);


        return Redirect::route('statuses_path');
    }




}

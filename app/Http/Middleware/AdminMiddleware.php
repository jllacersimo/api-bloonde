<?php


namespace App\Http\Middleware;


use App\Http\ResponseHelper;
use Closure;
use Illuminate\Http\Request;
use Src\Domain\Contracts\UserRepository;


class AdminMiddleware
{
    use ResponseHelper;


    private static string $ADMIN = "1";
    private static string $CUSTOMER = "2";
    private $userRepository;



    public function __construct(
        UserRepository $userRepository
    ){
        $this->userRepository = $userRepository;
    }


    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = $this->userRepository->findById($this->userRepository->getSessionUserId());

        if ($request->route()->parameters()['id'] != $user->getId() && $user->getProfileId() != AdminMiddleware::$ADMIN) {
            return $this->makeErrorResponse("Unauthorized",401);
        }

        return $next($request);
    }

}

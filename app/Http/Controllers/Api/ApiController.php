<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\PhotoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * @OA\Info(
 *     title="Api Documentation",
 *     version="1.0.0",
 *     @OA\Contact(
 *          email="ivan@gmail.com"
 *      ),
 *     @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 * @OA\Tag(
 *     name="User",
 *     description="You can add and see users here"
 * )
 * @OA\Server(
 *     description="Api Documentation",
 *     url="http://127.0.0.1:8000/api"
 * ),
 * @OA\SecurityScheme(
 *      securityScheme="token",
 *      type="apiKey",
 *      name="Authorization",
 *      in="header",
 *      description="(Bearer defrfgiuhdwiquhgdiuwe324fem3kmerf)"
 * )
 */
class ApiController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @OA\Get(
     *  path="/users",
     *  operationId="usersAll",
     *  tags={"User"},
     *  summary="Get All users with count per page",
     *  @OA\Parameter(
     *     name="perPage",
     *     in="query",
     *     description="The number item per page",
     *     required=false,
     *     @OA\Schema(
     *          type="integer"
     *     )
     * ),
     *  @OA\Response(
     *     response="200",
     *     description="status ok",
     * ),
     *  @OA\Response(
     *     response="500",
     *     description="server error",
     * ),
     *)
     */
    public function getUsers(Request $request): JsonResponse
    {
        $perPage = $request->perPage ?? 6;
        $users = User::query()->orderBy('created_at', 'desc')->limit($perPage)->get();

        return response()->json($users);
    }

    /**
     * @OA\Post(
     *     path="/users",
     *     operationId="createUser",
     *     tags={"User"},
     *     summary="Create new user",
     *      security={{"token": {}}},
     *     @OA\Response(
     *          response="401",
     *          description="Unauthenticated",
     *           @OA\MediaType(
     *              mediaType="application/json"
     *          )
     *     ),
     *     @OA\Response(
     *          response="422",
     *          description="Unprocessable Content",
     *           @OA\MediaType(
     *              mediaType="application/json"
     *          )
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="answer",
     *           @OA\MediaType(
     *              mediaType="application/json"
     *          )
     *     ),
     *     @OA\Response(
     *          response="204",
     *          description="sucess",
     *     ),
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *
     *                 @OA\Property(
     *                      property="name",
     *                      title="name",
     *                      description="Some text field",
     *                      type="string",
     *                      example="test",
     *                 ),
     *                  @OA\Property(
     *                      property="email",
     *                      title="email",
     *                      description="Some email",
     *                      type="string",
     *                      example="email@gmail.com",
     *                 ),
     *                  @OA\Property(
     *                      property="photo",
     *                      title="photo",
     *                      description="Some photo",
     *                      type="file",
     *
     *                 ),
     *                   @OA\Property(
     *                      property="password",
     *                      title="password",
     *                      description="password",
     *                      type="string",
     *                      example="12345678",
     *                 ),
     *                  @OA\Property(
     *                      property="password_confirmation",
     *                      title="password_confirmation",
     *                      description="password_confirmation",
     *                      type="string",
     *                      example="12345678",
     *                 ),
     *             )
     *         )
     *      )
     * )
     * @param Request $request
     * @return JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function save(Request $request): JsonResponse
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'photo' => 'required|mimes:jpeg,jpg,bmp,png',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // $method это метод по работе с изображением;
        $pass = PhotoService::optimize($request, 'fit', 70, 70);
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'photo' => $pass,
            'password' => Hash::make($request->get('password')),
        ]);
        return response()->json([], 204);
    }

    /**
     * @return mixed
     *  @OA\Get(
     *  path="/token",
     *  operationId="getApiToken",
     *  tags={"User"},
     *  summary="Give api token",
     *  @OA\Response(
     *     response="200",
     *     description="status ok",
     *     @OA\MediaType(
     *              mediaType="application/json"
     *     ),
     * ),
     *  @OA\Response(
     *     response="500",
     *     description="server error",
     * ),
     *)
     */
    public function getApiToken()
    {
        return config('apitokens')[0];
    }
}

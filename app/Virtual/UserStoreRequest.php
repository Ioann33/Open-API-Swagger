<?php
namespace App\Virtual;
/**
 * @OA\Schema(
 *    description="User model",
 *     type="object",
 *     title="User storring request"
 * )
 */
class UserStoreRequest
{
    /**
     * @OA\Property(
     *     title="Name",
     *     description="Some text field",
     *     format="string",
     *     example="test",
     * )
     *
     * @var string
     */
    public string $name;

    /**
     * @OA\Property(
     *     title="Email",
     *     description="Some email",
     *     format="string",
     *     example="test@gmail.com",
     * )
     *
     * @var string
     */
    public string $email;

    /**
     * @OA\Property(
     *     title="Photo",
     *     description="Some photo",
     *     format="mimes",
     *
     * )
     *
     */
    public $photo;

    /**
     * @OA\Property(
     *     title="Password",
     *     description="Some pass",
     *     format="string",
     *     example="123445EE",
     * )
     *
     * @var string
     */
    public string $password;
}

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
     *     default="https://via.placeholder.com/70x70.png/004411?text=labore",
     *     format="string",
     *
     * )
     *
     */
    public $photo;

    /**
     * @OA\Property(
     *     title="Password",
     *     description="Some pass",
     *
     *     format="string",
     *     example="$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
     * )
     *
     * @var string
     */
    public string $password;
}

<?php

namespace App\Http\Requests\Achievements;

use JetBrains\PhpStorm\ArrayShape;
use App\Rules\SafeExpressionLanguage;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     title="Store achievement request",
 *     description="Store achievement request body data",
 *     type="object",
 * )
 * @OA\Property(
 *     title="name",
 *     description="Name of the new achievement",
 *     example="A nice achievement",
 *     property="name"
 * )
 *
 * @OA\Property(
 *     title="slug",
 *     description="Slug of the new project",
 *     example="this-is-new-achievement's-slug",
 *     property="slug"
 * )
 *
 *
 * @OA\Property(
 *     title="description",
 *     description="Description of the new achievement",
 *     example="This is new achievement's description",
 *     property="description"
 * )
 *
 * @OA\Property(
 *     title="expression",
 *     description="Expression of the new achievement",
 *     example="exercise.taskResults.countWithCondition('assessment', 10)",
 *     property="expression"
 * )
 */
class ValidateUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['name' => "string", 'slug' => "string", 'description' => "string", 'expression' => "string"])]
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|nullable|string',
            'slug' => 'sometimes|required|nullable|string',
            'description' => 'sometimes|required|nullable|string',
            'expression' => ['sometimes', 'required', 'nullable', 'string', new SafeExpressionLanguage()]
        ];
    }
}

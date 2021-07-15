<?php

namespace App\Http\Requests\TaskResults;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @OA\Schema(
 *     title="Task result request",
 *     description="Task result request body data",
 *     type="object",
 * )
 * @OA\Property(
 *    title="TaskId",
 *    description="Id of the task result corresponds to",
 *    format="int64",
 *    example="1",
 *    type="integer",
 *    property="task_id",
 * ),
 * @OA\Property(
 *    title="UserId",
 *    description="SId of the user result corresponds to",
 *    format="int64",
 *    example="1",
 *    type="integer",
 *    property="user_id"
 * ),
 * @OA\Property(
 *    title="Course or module id",
 *    description="Course or module id",
 *    example="1",
 *    format="int64",
 *    type="integer",
 *    property="exercise_group_id"
 * ),
 * @OA\Property(
 *    title="Assessment mark",
 *    description="Assessment mark",
 *    example="10",
 *    type="float",
 *    property="assessment"
 *  )
 */
class ValidateStoreTaskResultRequest extends FormRequest
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
    #[ArrayShape(['task_id' => "string", 'user_id' => "string", 'exercise_group_id' => "string", 'assessment' => "string"])]
    public function rules(): array
    {
        return [
            'task_id' => 'required|numeric|gte:1',
            'user_id' => 'required|numeric|gte:1',
            'exercise_group_id' => 'required|numeric|gte:1',
            'assessment' => 'required',
        ];
    }
}

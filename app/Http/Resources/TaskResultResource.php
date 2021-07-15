<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @OA\Schema(
 *     title="TaskResultResource",
 *     description="Task result resource",
 *     @OA\Xml(
 *   name="TaskResultResource"
 *     ),
 *
 *    @OA\Property(
 *     title="id",
 *     description="id",
 *     type="integer",
 *     property="id",
 *     format="int64",
 *     example=1
 * ),
 * @OA\Property(
 *           title="TaskId",
 *           description="Id of the task result corresponds to",
 *           format="int64",
 *           example="1",
 *           type="integer",
 *           property="task_id",
 *       ),
 *       @OA\Property(
 *           title="UserId",
 *           description="SId of the user result corresponds to",
 *           format="int64",
 *           example="1",
 *           type="integer",
 *           property="user_id"
 *       ),
 *       @OA\Property(
 *           title="Course or module id",
 *           description="Course or module id",
 *           example="1",
 *           format="int64",
 *           type="integer",
 *           property="exercise_group_id"
 *       ),
 *       @OA\Property(
 *           title="Assessment mark",
 *           description="Assessment mark",
 *           example="10",
 *           type="float",
 *           property="assessment"
 *       ),
 *       @OA\Property(
 *           title="Created at",
 *           description="Created at",
 *           example="2020-01-27 17:50:45",
 *           format="datetime",
 *           type="string",
 *           property="created_at"
 *       ),
 *       @OA\Property(
 *           title="Updated at",
 *           description="Created at",
 *           example="2020-01-27 17:50:45",
 *           format="datetime",
 *           type="string",
 *           property="updated_at"
 *       )
 * )
 */
class TaskResultResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    #[ArrayShape(['id' => "mixed", 'task_id' => "mixed", 'user_id' => "mixed", 'exercise_group_id' => "mixed", 'assessment' => "mixed", 'created_at' => "mixed", 'updated_at' => "mixed"])]
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'task_id' => $this->task_id,
            'user_id' => $this->user_id,
            'exercise_group_id' => $this->exercise_group_id,
            'assessment' => $this->assessment,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}

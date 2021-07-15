<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @OA\Schema(
 *     title="IndexTaskResultsResource",
 *     description="Task result resource",
 *     @OA\Xml(
 *         name="IndexTaskResultsResource"
 *     ),
 *     @OA\Property(
 *         title="meta",
 *         description="Pagination metadata",
 *         property="meta",
 *         type="object",
 *             @OA\Property(
 *                 title="page",
 *                 description="Page number",
 *                 type="integer",
 *                 property="page",
 *                 format="int64",
 *                 example=1
 *            ),
 *            @OA\Property(
 *                 title="per-page",
 *                 description="Number of entries per page",
 *                 type="integer",
 *                 property="per-page",
 *                 format="int64",
 *                 example=10
 *            )
 *     ),
 *     @OA\Property(
 *         title="data",
 *         description="Data wrapper",
 *         property="data",
 *         type="array",
 *         @OA\Items(type="object",
 *             @OA\Property(
 *                 title="id",
 *                 description="id",
 *                 type="integer",
 *                 property="id",
 *                 format="int64",
 *                 example=1
 *             ),
 *             @OA\Property(
 *                 title="TaskId",
 *                 description="Id of the task result corresponds to",
 *                 format="int64",
 *                 example="1",
 *                 type="integer",
 *                 property="task_id",
 *             ),
 *             @OA\Property(
 *                 title="UserId",
 *                 description="SId of the user result corresponds to",
 *                 format="int64",
 *                 example="1",
 *                 type="integer",
 *                 property="user_id"
 *             ),
 *             @OA\Property(
 *                 title="Course or module id",
 *                 description="Course or module id",
 *                 example="1",
 *                 format="int64",
 *                 type="integer",
 *                 property="exercise_group_id"
 *             ),
 *             @OA\Property(
 *                 title="Assessment mark",
 *                 description="Assessment mark",
 *                 example="10",
 *                 type="float",
 *                 property="assessment"
 *             ),
 *             @OA\Property(
 *                 title="Created at",
 *                 description="Created at",
 *                 example="2020-01-27 17:50:45",
 *                 format="datetime",
 *                 type="string",
 *                 property="created_at"
 *             ),
 *             @OA\Property(
 *                 title="Updated at",
 *                 description="Created at",
 *                 example="2020-01-27 17:50:45",
 *                 format="datetime",
 *                 type="string",
 *                 property="updated_at"
 *             )
 *         )
 *     )
 * )
 */
class TaskResultCollection extends ResourceCollection
{
    public const PER_PAGE = 10;
    public const PAGE = 1;

    /**
     * @var int
     */
    private int $page;

    /**
     * @var int
     */
    private int $perPage;

    /**
     * TaskResultCollection constructor.
     *
     * @param Collection $taskResults
     * @param int $page
     * @param int $perPage
     */
    public function __construct(Collection $taskResults, int $page, int $perPage)
    {
        parent::__construct($taskResults);
        $this->page = $page;
        $this->perPage = $perPage;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    #[ArrayShape(['meta' => "array", 'data' => "\Illuminate\Support\Collection"])]
    public function toArray($request): array
    {
        return [
            'meta' => [
                'page' => $this->page,
                'per-page' => $this->perPage
            ],
            'data' => $this->collection,
        ];
    }
}

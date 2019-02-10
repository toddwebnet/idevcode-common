<?php

namespace IDevCode\Services\Responses;

use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseCodes;

class ApiResponse extends ApiResponseBase
{
    private $status;

    public function __construct(int $responseCode = ResponseCodes::HTTP_OK, string $status = "Success")
    {
        $this->status = $status;
        parent::__construct($responseCode);
    }

    /**
     * @param $messages
     * @return string
     */
    public function getContent($messages): ?string
    {
        if (trim($messages) == '') {
            return '';
        }
        return json_encode((object)[
            'status' => $this->status,
            'message' => $messages
        ]);
    }

    /**
     * setStatus
     *
     * @param $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * getStatus
     *
     * @param $status
     * @return string
     */
    public function getStatus($status)
    {
        return $this->status;
    }


    /**
     * emptyResponse
     *
     * @return Response
     */
    public static function emptyResponse()
    {
        return (new self(Response::HTTP_NO_CONTENT))->getResponse('');
    }

    /**
     * notFoundResponse
     *
     * @return Response
     */
    public static function notFoundResponse()
    {
        return (new self(Response::HTTP_NOT_FOUND))->getResponse('');
    }

    /**
     * @return Response
     */
    public static function notAuthorizedResponse()
    {
        return (new self(Response::HTTP_FORBIDDEN))->getResponse('');
    }

}

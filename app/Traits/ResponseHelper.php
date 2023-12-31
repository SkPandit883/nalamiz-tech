<?php
namespace App\Traits;


/**
 * Service Class for Response Handler
 *
 */

trait ResponseHelper
{

/**
 * @param        $data
 * @param string $message
 * @return JsonResponse
 */
  public  function success($data, $message = 'Operation Successful')
    {
        return response()->json([
            'status' => 'ok',
            'message' => $message,
            'payload' => $data,
        ], 200, [], JSON_PRETTY_PRINT);

    }



/**
 * @param        $data
 * @param string $message
 * @return JsonResponse
 */
    public  function created($data, $message = 'Data created Successfully')
    {
        return response()->json([
            'status' => 'ok',
            'message' => $message,
            'payload' => $data,
        ], 201, [], JSON_PRETTY_PRINT);
    }



/**
 * @param        $data
 * @param string $message
 * @return JsonResponse
 */
    public   function updated($data, $message = 'Data modified successfully')
    {
        return response()->json([
            'status' => 'ok',
            'message' => $message,
            'payload' => $data,
        ], 200, [], JSON_PRETTY_PRINT);
    }



/**
 * @param string $message
 * @return JsonResponse
 */
    public   function deleted($data=null,$message = 'Deleted successfully')
    {
        return response()->json([
            'status' => 'ok',
            'payload'=>$data,
            'message' => $message,
        ], 200, [], JSON_PRETTY_PRINT);
    }






/**
 * @param        $data
 * @param string $message
 * @return JsonResponse
 */
    public   function error($data, $message = 'Invalid Data', $error_code = 500)
    {
        return response()->json([
            'status' => 'err',
            'message' => $message,
            'errors' => $data,
        ], $error_code, [], JSON_PRETTY_PRINT);

    }

}

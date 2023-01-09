<?php

namespace App\Http\Controllers\Api\DoctorOrderType;

use App\Http\Controllers\Controller;
use App\Models\DoctorOrderType;
use Illuminate\Http\Request;

class DoctorOrderTypeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = new DoctorOrderType;
            $data->type_name = $request->get('type_name');
            $data->multi_select = $request->get('multi_select');
            $data->order_for = $request->get('order_for');
            $data->no = $request->get('no');
            $data->save();

            return response()->json([
                'message' => 'The order type was created successfully',
                'ordertype' => $data
            ]);
        } catch (\Exception $e) {
            logger('Error in DoctorOrderTypeController.strore', [$e->getMessage()]);
            return response()->json(['error' => 'Something went wrong saving the order type'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoctorOrderType  $doctorOrderType
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorOrderType $doctorOrderType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DoctorOrderType  $doctorOrderType
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorOrderType $doctorOrderType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DoctorOrderType  $doctorOrderType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoctorOrderType $doctorOrderType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = DoctorOrderType::findOrFail($id);
            $data->delete();
            return response()->json([
                'message' => 'The order type was deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong deleteing!'], 400);
        }
    }
}

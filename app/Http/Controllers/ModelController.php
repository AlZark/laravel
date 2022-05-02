<?php

namespace App\Http\Controllers;

use App\Models\Model;
use Illuminate\Http\Request;

class ModelController
{

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_by_manufacturer(Request $request)
    {
        //abort_unless(\Gate::allows('city_access'), 401);

        if (!$request->manufacturer_id) {
            $html = '<option value="">'.trans('global.pleaseSelect').'</option>';
        } else {
            $html = '';
            $models = Model::where('manufacturer_id', $request->manufacturer_id)->get();
            foreach ($models as $model) {
                $html .= '<option value="'.$model->id.'">'.$model->name.'</option>';
            }
        }

        return response()->json(['html' => $html]);
    }
}

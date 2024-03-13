<?php

namespace App\Controllers;

class GameController
{
    public static function indexAction()
    {
        $data = [['id' => 1, 'name' => 'Tanks'],['id' => 2, 'name' => 'Car Racing']];
        echo_json($data);
    }

    public static function rankAction($id)
    {
        $data = '';
        if ($id == 1){
            $join = ['[>]playerLink_tanks' => ['battlePasstanks.id' => 'uuid']];
            $column = ['battlePasstanks.id','battlePasstanks.json','playerLink_tanks.name'];
            $where = [];
            $data = db_select('battlePasstanks', $join, $column, $where);
        }else{
            $join = ['[>]playerLink_mckart' => ['battlePassmckart.id' => 'uuid']];
            $column = ['battlePassmckart.id','battlePassmckart.json','playerLink_mckart.name'];
            $where = [];
            $data = db_select('battlePassmckart', $join, $column, $where);
        }


        echo_json(self::convertAndSort($data));

    }

    private static function convertAndSort($data){
        // Lấy id, name, và point từ mỗi phần tử
        $converted_data = array_map(function($item) {
            $data_dict = json_decode($item["json"], true);
            return [
                "id" => $item["id"],
                "name" => $item["name"],
                "point" => $data_dict["points"],
            ];
        }, $data);

       // Sắp xếp mảng theo điểm
        $points = array_column($converted_data, "point");
        array_multisort($points, SORT_DESC, $converted_data);

        return $converted_data;

    }



}
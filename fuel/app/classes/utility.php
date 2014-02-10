<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bommortal
 * Date: 12/16/13 AD
 * Time: 10:55 AM
 * To change this template use File | Settings | File Templates.
 */

class Utility
{

    /**
     * @param null $find
     * @param null $lang
     * @return string
     */
    public static function province($find = null, $lang = null)
    {

        $data = '';
        $lang = is_null($lang) ? $lang = 'th' : $lang = 'en';
        $lang = 'name_' . $lang;

        if (is_null($find)) {
            $model = Model_Provinces::find('all');


            foreach ($model as $v) {
                $data[$v->id] = $v->$lang;
            }
        } else if (is_int($find)) {
            $model = Model_Provinces::find($find);

            if ($model) {
                $data = $model;
            }
        }

        return $data;
    }

    /**
     * @param null $find
     * @param null $province
     * @param null $lang
     * @return array|string
     */
    public static function districts($find = null, $province = null, $lang = null)
    {
        $data = '';
        $lang = is_null($lang) ? $lang = 'th' : $lang = 'en';
        $lang = 'name_' . $lang;

        if (is_null($find)) {
            $model = Model_Districts::find('all');
            if ($model) {
                $data = self::select($model, $lang);
            }
        } else if (is_int($find)) {
            $model = Model_Districts::find($find);
            if ($model) {
                $data = $model;
            }
        } else if (!is_null($province)) {
            $model = Model_Districts::find('all', array(
                'province_id' => $province
            ));

            if ($model) {
                $data = self::select($model, $lang);
            }
        }

        return $data;
    }

    /**
     * @param $model
     * @param $value
     * @return array
     */
    public static function select($model, $value)
    {
        $data = array(0=>'--SELECT--');

        foreach ($model as $m) {
            $data[$m->id] = $m->$value;
        }

        return $data;
    }



}
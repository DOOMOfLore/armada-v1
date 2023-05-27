<?php

namespace App\Helpers;

use App\Models\Armada;
use App\Models\Kategori;
use App\Models\KotaTujuan;
use App\Models\Agen;


Class Helpers
{
    public static function listArmada()
    {
        $option = "<option>Select Armada</option>";

        $getArmada = Armada::all();

        foreach ($getArmada as $key => $value) {
            $option .= "<option value='" . $value['armada_id'] . "'>" .$value['armada_name']. "</option>";
        }

        return $option;
    }

    public static function listKategori()
    {
        $option = "<option>Select Kategori</option>";

        $getKategori = Kategori::all();

        foreach ($getKategori as $key => $value) {
            $option .= "<option value='" . $value['kategori_id'] . "'>" .$value['kategori_name']. "</option>";
        }

        return $option;
    }
    
    public static function listKotaTujuan()
    {
        $option = "<option>Select Kota Tujuan</option>";

        $getKotaTujuan = KotaTujuan::all();

        foreach ($getKotaTujuan as $key => $value) {
            $option .= "<option value='" . $value['kota_id'] . "'>" .$value['kota_name']. "</option>";
        }

        return $option;
    }
    
    public static function listAgen()
    {
        $option = "<option>Select Agen</option>";

        $getAgen = Agen::all();

        foreach ($getAgen as $key => $value) {
            $option .= "<option value='" . $value['agen_id'] . "'>" .$value['agen_name']. "</option>";
        }

        return $option;
    }
}

?>

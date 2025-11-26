<?php

namespace App\Controllers;
use App\Models\CriteriaModel;
use App\Models\AlternativeModel;
use App\Models\MatrixModel;

class Home extends BaseController
{
  public function index()
{
    $criteriaModel = new CriteriaModel();
    $alternativeModel = new AlternativeModel();
    $matrixModel = new MatrixModel();

    $criterias = $criteriaModel->findAll();
    $alternatives = $alternativeModel->findAll();
    $matrix = $matrixModel->findAll();

    // Ambil matrix dalam bentuk [alt][cri]
    $matrixData = [];
    foreach ($alternatives as $alt) {
        foreach ($criterias as $cri) {
            foreach ($matrix as $m) {
                if ($m['alternative_id'] == $alt['id'] && $m['criteria_id'] == $cri['id']) {
                    $matrixData[$alt['id']][$cri['id']] = $m['value'];
                }
            }
        }
    }

    // Hitung max/min per kriteria
    $maxValue = [];
    $minValue = [];

    foreach ($criterias as $cri) {
        $temp = [];
        foreach ($alternatives as $alt) {
            $temp[] = $matrixData[$alt['id']][$cri['id']];
        }
        $maxValue[$cri['id']] = max($temp);
        $minValue[$cri['id']] = min($temp);
    }

    // Normalisasi MAUT
    $normalisasi = [];

    foreach ($alternatives as $alt) {
        foreach ($criterias as $cri) {

            $x = $matrixData[$alt['id']][$cri['id']];
            $min = $minValue[$cri['id']];
            $max = $maxValue[$cri['id']];

            // Jika max == min, semua normalisasi = 1
            if ($max == $min) {
                $normalisasi[$alt['id']][$cri['id']] = 1;
            } else {
                $normalisasi[$alt['id']][$cri['id']] = ($x - $min) / ($max - $min);
            }
        }
    }

    // Hitung utility total
    $utility = [];

    foreach ($alternatives as $alt) {
        $U = 0;
        foreach ($criterias as $cri) {
            $bobot = $cri['weight'] / 100; // konversi persen ke desimal
            $U += $normalisasi[$alt['id']][$cri['id']] * $bobot;
        }
        $utility[$alt['id']] = $U;
    }

    return view('Matrix', [
        'criterias' => $criterias,
        'alternatives' => $alternatives,
        'matrix' => $matrixData,
        'maxValue' => $maxValue,
        'minValue' => $minValue,
        'normalisasi' => $normalisasi,
        'utility' => $utility
    ]);
}

}

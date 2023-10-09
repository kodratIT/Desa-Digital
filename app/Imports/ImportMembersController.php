<?php

namespace App\Imports;

use App\Models\ModelFamily;
use Maatwebsite\Excel\Concerns\ToModel;

use Carbon\Carbon;
class ImportMembersController implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $excelDateSerial = intval($row[5]);  // Example Excel date serial

        // Convert Excel date serial to a timestamp (in seconds)
        $timestamp = ($excelDateSerial - 25569) * 86400;
        
        // Convert timestamp to a Carbon instance
        $date = Carbon::createFromTimestamp($timestamp);
        
        // Format the date as needed (e.g., 'Y-m-d')
        $formattedDate = $date->format('Y-m-d');
        
        return new ModelFamily([
            'no_kk' => intval($row[0]),
            'name' => $row[1],
            'no_nik' => $row[2],
            'tempat_lahir' => $row[3],
            'agama' => $row[4],
            'tanggal_lahir' => $formattedDate,
            'jenis_kelamin' => $row[6],
            'pendidikan' => $row[7],
            'pekerjaan' => $row[8],
            'status' => $row[9],
        ]);
    }
}

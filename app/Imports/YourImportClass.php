<?php
use Maatwebsite\Excel\Concerns\ToModel;

class YourImportClass implements ToModel
{
    public function model(array $row)
    {
        // Define how to create a model from a row of data in your Excel file
        return new YourModel([
            'column1' => $row[0],
            'column2' => $row[1],
            // Add more columns as needed
        ]);
    }
}


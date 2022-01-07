<?php

namespace App\Exports;

use App\Models\Ibventur;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class FormExport extends DefaultValueBinder implements 
    FromView, 
    ShouldAutoSize,
    WithCustomValueBinder,
    WithStyles,
    WithColumnWidths
{

    private $email;

    public function __construct($email)
    {
        $this->email = $email;
    }
    
    public function view() : View
    {
        $request = Ibventur::query()->where('email', $this->email)
            ->orderBy('id', 'DESC')
            ->first();

        //get data from database
        $data = [];
        $data['revenue'] = number_format($request->aveturnover, 2);
        $data['year_growth'] = $request->growingincome;
        $data['avg_ebitda'] = number_format($request->ebitda, 2);
        $data['avg_net'] = number_format($request->avenetincome, 2);
        $data['year_pos_net_result'] = $request->pos_result;
        $data['net_debt'] = number_format($request->netfindebt, 2);
        $data['fixed_assets'] = $request->fixedassets;
        $data['biggest_shareholder'] = $request->companypercent . '%';
        $data['revenue_from_big_client'] = $request->perturncustomer . '%';
        $data['audited'] = $request->audited;
        $data['m_a'] = $request->pur_operations;
        $data['sell_90'] = $request->sell_company;

        //special computation
        $deuda_ebitda = ($request->ebitda == 0) ? 0 : ((int)$request->netfindebt / (int)$request->ebitda);
        $data['deuda_ebitda'] = $deuda_ebitda;
        $asset_revenue_ratio = ($request->aveturnover == 0) ? 0 : ((int)$request->fixedassets / (int)$request->aveturnover);
        $data['asset_revenue_ratio'] = $asset_revenue_ratio;
        $ebitda_rev = ($request->aveturnover == 0) ? '0%' : ((int)$request->ebitda / (int)$request->aveturnover) . '%';
        $data['ebitda_rev'] = $ebitda_rev;
        $data['result']['ebitda_rev'] = ($ebitda_rev >= 7) ? 1 : 0;
        $net_margin = ($request->aveturnover == 0) ? '0%' : ((int)$request->avenetincome / (int)$request->aveturnover) . '%';
        $data['net_margin'] = $net_margin;
        $data['result']['net_margin'] = ($net_margin >= 5) ? 1 : 0;

        $data['result']['revenue'] = ($request->aveturnover >= 1500000 && $request->aveturnover <= 10000000) ? 1 : 0;
        $data['result']['year_growth'] = ($request->growingincome >= 3) ? 1 : 0;
        $data['result']['avg_ebitda'] = ($request->ebitda >= 150000) ? 1 : -100;
        $data['result']['avg_net'] = ($request->avenetincome >= 70000) ? 1 : 0;
        $data['result']['year_pos_net_result'] = ($request->pos_result >= 3) ? 1 : 0;
        $data['result']['net_debt'] = ($deuda_ebitda <= 2) ? 1 : (($deuda_ebitda > 3) ? -100 : 0);
        $data['result']['fixed_assets'] = ($asset_revenue_ratio <= 1.5) ? 1 : 0;
        $data['result']['biggest_shareholder'] = ($request->companypercent >= 65) ? 1 : 0;
        $data['result']['revenue_from_big_client'] = ($request->perturncustomer >= 40) ? 1 : 0;
        $data['result']['audited'] = ($request->audited == 'Yes') ? 1 : 0;
        $data['result']['m_a'] = ($request->pur_operations == 'No') ? 1 : 0;
        $data['result']['sell_90'] = ($request->sell_company == 'Yes') ? 1 : -100;

        $data['total_score'] = array_sum($data['result']);
        $data['decision'] = ($data['total_score'] >= 10) ? "GO" : "NO-GO";
        if ($data['total_score'] >= 10) {
            $data['decision'] = 'GO';
            $data['message'] = "Thanks for sending information about your company. It seems to fit “Iberian Ventures” investment criteria an associate in the team will reach out to you for next steps";
        } else {
            $data['decision'] = 'NO-GO';
            $data['message'] = "Thanks for sending information about your company. Unfortunately, it seems that this company does not meet “Iberian 3 Ventures” investment criteria. Regardless, we will take a second look in detail and send you an email";
        }

        return view('ibventur.export.export', ['data' => $data]);
    }

    public function bindValue(Cell $cell, $value)
    {
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_NUMERIC);
            return true;
        }

        // else return default behavior
        return parent::bindValue($cell, $value);
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A15')->getAlignment('center')->setWrapText(true);
       
        return [
            // Style the first row as bold text.
            'B'    => ['font' => ['bold' => true]],
            'C'    => ['font' => ['bold' => true]],
            'F'    => ['font' => ['bold' => true]],
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 65,
            'B' => 35,
            'C' => 15,
        ];
    }
}

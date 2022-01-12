<?php

namespace App\Http\Controllers;

use App\Exports\FormExport;
use App\Models\Ibventur;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\DB;
use App\Mail\MyMail;
use Illuminate\Support\Facades\Mail;

class AngularController extends Controller
{
    //
    public function review( Request $request){
        //check the status
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
            $data['email_message'] = 'A client had a higher or equal to 10 base on our rating kindly check his/her form.';
            $data['message'] = "Thanks for sending information about your company. It seems to fit “Iberian Ventures” investment criteria an associate in the team will reach out to you for next steps";
        } else {
            $data['decision'] = 'NO-GO';
            $data['email_message'] = 'Sadly, a client had a lower than 10 rating kindly check his/her form.';
            $data['message'] = "Thanks for sending information about your company. Unfortunately, it seems that this company does not meet “Iberian 3 Ventures” investment criteria. Regardless, we will take a second look in detail and send you an email";
        }
        if(is_null($data['total_score'])){
            $data['message'] = "No data found";
        }
        //send the message to the email.
        $email = $request->email;

        // print_r($data);
        $request->validate([
            'sector' => 'required',
            'email' => 'required',
            'aveturnover' => 'required',
            'growingincome' => 'required',
            'ebitda' => 'required',
            'avenetincome' => 'required',
            'pos_result' => 'required',
            'netfindebt' => 'required',
            'fixedassets' => 'required',
            'companypercent' => 'required',
            'perturncustomer' => 'required',
            'audited' => 'required',
            'pur_operations' => 'required',
            'sell_company' => 'required',
        ]);

        Ibventur::create($request->all());

        //get the latest ID.
        $lastID = DB::table('ibventur')->orderBy('id', 'DESC')->first();

        $this->excel->store(new FormExport($request->email), 'requestform-' . $lastID->id . '.xlsx', 'local', Excel::XLSX);
        // return Excel::store(new FormExport($request->email), 'requestform.xlsx');

        $details = [
            'email' => 'luis@ibventur.es',
            'cc' => 'lucklegend@gmail.com',
            'title' => 'A from was submitted by ' . $request->email,
            'body' => $data['email_message'],
            'file' => 'requestform-' . $lastID->id . '.xlsx',
        ];


        Mail::to($details["email"])
            ->cc($details['cc'])
            ->send(new MyMail($details));
        

        //return JSON message
        return ['message' =>$data['message']];
    }
}

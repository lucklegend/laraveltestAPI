<table>
  <thead>
    <tr>
      <th><b><a href="https://www.ibventur.es/Valoracion/">Field as shown on the website</a></b></th>
      <th><b>Field</b></th>
      <th><b>Values</b></th>
      <th><b>Result</b></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Facturación media de los últimos 3 año (en €):</td>
      <td>Revenue</td>
      <td>{{ $data['revenue'] }}</td>
      <td>{{ $data['result']['revenue'] }}</td>
      <td>Total Score</td>
      <td>{{ $data['total_score'] }}</td>
    </tr>

    <tr>
      <td>Años consecutivos creciendo ingreso:</td>
      <td>Years of growth</td>
      <td>{{ $data['year_growth'] }}</td>
      <td>{{ $data['result']['year_growth'] }}</td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <td>EBITDA media de los últimos 3 años (en €):</td>
      <td>Avg. EBITDA last 3 years</td>
      <td>{{ $data['avg_ebitda'] }}</td>
      <td>{{ $data['result']['avg_ebitda'] }}</td>
      <td>Decision</td>
      <td>{{ $data['decision'] }}</td>
    </tr>

    <tr>
      <td>Resultado neto medio de los últimos 3 años (en €):</td>
      <td>Avg. net result last 3 years</td>
      <td>{{ $data['avg_net'] }}</td>
      <td>{{ $data['result']['avg_net'] }}</td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <td>Años consecutivos con resultado positivo:</td>
      <td>Years with positive net results</td>
      <td>{{ $data['year_pos_net_result'] }}</td>
      <td>{{ $data['result']['year_pos_net_result'] }}</td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <td>Deuda financiera neta total (en €):</td>
      <td>Net debt</td>
      <td>{{ $data['net_debt'] }}</td>
      <td>{{ $data['result']['net_debt'] }}</td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <td>Total activo inmovilizado (en €):</td>
      <td>Fixed assets</td>
      <td>{{ $data['net_debt'] }}</td>
      <td>{{ $data['result']['net_debt'] }}</td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <td>¿Porcentaje de la empresa del mayor accionista?:</td>
      <td>% biggest shareholder</td>
      <td>{{ $data['biggest_shareholder'] }}</td>
      <td>{{ $data['result']['biggest_shareholder'] }}</td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <td>Porcentaje de facturación que viene del mayor cliente:</td>
      <td>% revenue from biggest client</td>
      <td>{{ $data['revenue_from_big_client'] }}</td>
      <td>{{ $data['result']['revenue_from_big_client'] }}</td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <td>¿Ha sido auditada la compañía alguna vez?:</td>
      <td>Is the company audited? (yes/ no)</td>
      <td>{{ $data['audited'] }}</td>
      <td>{{ $data['result']['audited'] }}</td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <td> ¿Operaciones de compra o fusiones en los últimos 5 años? </td>
      <td> m and a in the last 5 years? (yes/ no) </td>
      <td> {{ $data['m_a'] }} </td>
      <td> {{ $data['result']['m_a'] }} </td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <td>¿Se quiere vender más del 90% de la compañía?</td>
      <td>Selling 90%? (yes/ no)</td>
      <td>{{ $data['sell_90'] }}</td>
      <td>{{ $data['result']['sell_90'] }}</td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <td colspan="6"></td>
    </tr>

    <tr>
      <td rowspan="4">Calculated fields (not on the website but important for calculations and "Go" or "No-Go" decisions</td>
      <td>EBITDA/Rev</td>
      <td>{{ $data['ebitda_rev'] }}</td>
      <td>{{ $data['result']['ebitda_rev'] }}</td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <td>Net margin</td>
      <td>{{ $data['net_margin'] }}</td>
      <td>{{ $data['result']['net_margin'] }}</td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <td>Deuda/EBITDA</td>
      <td>{{ $data['deuda_ebitda'] }}</td>
      <td></td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <td>Asset to revenue ratio</td>
      <td>{{ $data['asset_revenue_ratio'] }}</td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    
  </tbody>
</table>
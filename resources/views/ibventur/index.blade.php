@extends('ibventur.layouts.master')

@section('content')
<section id="banner" class="container-fluid ">
  <div class="container">
    <h2>Do you want to know how much your company is worth?</h2>
    <p>With a few facts about your business, we will tell you what its valuation is and if we are interested in buying it</p>
  </div>
</section>
<section id="form" class="padding">
  <div class="container">
    <h4>If you are considering selling your company, one of the fundamental questions is <span style="color:red">"How much is my company worth?"</span> - It is important that you have an idea of what the value of your business is and what elements are relevant. <br>With a few pieces of information about your business, our tool will help you determine a valuation (i.e. how many € you could <br>receive)</h4>
    <h4><br>
      This valuation form is useful for companies with <span style="color:red">more than €1MM in sales per year</span>
    </h4>
    <br>
    <form action="/review" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      <div class="row">
        <div class="col-md-5 offset-md-1"><span class="f-17 p-6">Sector in which your company operates:</span></div>
        <div class="col-md-6 "><input type="text" class="form-control" name="sector" placeholder="Sector or industry"></div>
      </div>

      <div class="row">
        <div class="col-md-5 offset-md-1"><span class="f-17 p-6">Contact email:</span></div>
        <div class="col-md-6 "><input type="email" class="form-control" name="email" placeholder="Contact email"></div>
      </div>

      <div class="row">
        <div class="col-md-5 offset-md-1"><span class="f-17 p-6">Average turnover of the last 3 years (in €):</span></div>
        <div class="col-md-6 "><input type="text" class="form-control" name="aveturnover" placeholder="What was the billing for the last year?"></div>
      </div>

      <div class="row">
        <div class="col-md-5 offset-md-1"><span class="f-17 p-6">Consecutive years growing income:</span></div>
        <div class="col-md-6 ">
          <select class="form-control" name="growingincome">
            <option value="0" selected>0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">>3</option>
          </select>
        </div>

      </div>

      <div class="row">
        <div class="col-md-5 offset-md-1"><span class="f-17 p-6">Average EBITDA for the last 3 years (in €):</span></div>
        <div class="col-md-6 "><input type="text" class="form-control" name="ebitda" placeholder="Net income before taxes and depreciation"></div>
      </div>

      <div class="row">
        <div class="col-md-5 offset-md-1"><span class="f-17 p-6">Average net result of the last 3 years (in €):</span></div>
        <div class="col-md-6 "><input type="text" class="form-control" name="avenetincome" placeholder="Net result for the last year"></div>
      </div>

      <div class="row">
        <div class="col-md-5 offset-md-1"><span class="f-17 p-6">Consecutive years with positive results:</span></div>
        <div class="col-md-6 ">
          <select class="form-control" name="pos_result">
            <option value="0" selected>0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">>3</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-md-5 offset-md-1"><span class="f-17 p-6">Total net financial debt (in €):</span></div>
        <div class="col-md-6 "><input type="text" class="form-control" name="netfindebt" placeholder="Total net financial debt in Euros"></div>
      </div>

      <div class="row">
        <div class="col-md-5 offset-md-1"><span class="f-17 p-6">Total assets fixed assets (in €):</span></div>
        <div class="col-md-6 "><input type="text" class="form-control" name="fixedassets" placeholder="Total net financial debt in Euros"></div>
      </div>

      <div class="row">
        <div class="col-md-5 offset-md-1"><span class="f-17 p-6">Percentage of the company of the largest shareholder?:</span></div>
        <div class="col-md-6 "><input type="text" class="form-control" name="companypercent" placeholder="Percentage of the company of the largest shareholder"></div>
      </div>

      <div class="row">
        <div class="col-md-5 offset-md-1"><span class="f-17 p-6">Percentage of turnover that comes from the largest customer:</span></div>
        <div class="col-md-6 "><input type="text" class="form-control" name="perturncustomer" placeholder="Percentage of turnover that comes from the largest customer:"></div>
      </div>

      <div class="row">
        <div class="col-md-5 offset-md-1"><span class="f-17 p-6">Has the company ever been audited?:</span></div>
        <div class="col-md-6 ">
          <select class="form-control" name="audited">
            <option value="No" selected>No</option>
            <option value="Yes">Yes</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-md-5 offset-md-1"><span class="f-17 p-6">Purchase operations or mergers in the last 5 years?</span></div>
        <div class="col-md-6 ">
          <select class="form-control" name="pur_operations">
            <option value="No" selected>No</option>
            <option value="Yes">Yes</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-md-5 offset-md-1"><span class="f-17 p-6">Do you want to sell more than 90% of the company?</span></div>
        <div class="col-md-6 ">
          <select class="form-control" name="sell_company">
            <option value="No" selected>No</option>
            <option value="Yes">Yes</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <input type="submit" name="submit" value="SEND" class="btn btn-secondary btn-send">
        </div>
      </div>
    </form>
  </div>
</section>
@endsection
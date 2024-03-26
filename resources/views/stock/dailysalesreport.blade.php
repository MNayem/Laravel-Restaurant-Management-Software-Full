@extends('adminHome')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


<style>
     
</style>

<table class="table table-bordered table-dark">
  <thead>
  <th colspan="76"><h2 style="text-align: center; color: yellow;">    ***DAILY SALES REPORT***    ***DAILY SALES REPORT***    ***DAILY SALES REPORT***    ***DAILY SALES REPORT***    ***DAILY SALES REPORT***    ***DAILY SALES REPORT***    ***DAILY SALES REPORT***    ***DAILY SALES REPORT***    ***DAILY SALES REPORT***    ***DAILY SALES REPORT***    ***DAILY SALES REPORT***        ***DAILY SALES REPORT***    ***DAILY SALES REPORT***    </h2></th>
    <tr align="center" style="color: #BB2D3B;">
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Volume (gm)</th>
      <th scope="col">Pack Size(Box)</th>
      <th scope="col">Pack Size(Ctn)</th>
      <th scope="col">Description</th>
      <th scope="col">Rate(pcs/box)</th>
      <th scope="col">TP Rate(pcs)</th>
      <th scope="col" colspan="8">Sagor Traders</th>
      <th scope="col" colspan="6">RS Enterprise</th>
      <th scope="col" colspan="6">Aastha</th>
      <th scope="col" colspan="6">Sardar Enterprise</th>
      <th scope="col" colspan="4">Tanvir Enterprise</th>
      <th scope="col" colspan="6">SS Enterprise</th>
      <th scope="col" colspan="4">Sheikh Enterprise</th>
      <th scope="col" colspan="4">Allahardan Traders</th>
      <th scope="col" colspan="4">Tawhid Traders</th>
      <th scope="col" colspan="4">Princo Store</th>
      <th scope="col" colspan="4">Saiful Store</th>
      <th scope="col" colspan="4">Fatima Jannat Nur</th>
      <th scope="col" colspan="4">Mongla</th>
      <th scope="col" colspan="4">Kazi Enterprise</th>
    </tr>
  </thead>
  <tbody>
    <tr align="center">
      <th scope="row">1</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>Rimon</td>
      <td>Ripon</td>
      <td>Rony</td>
      <td>Litu</td>
      <td>Khulna</td>
      <td>Opening</td>
      <td>Primary</td>
      <td>Closing</td>
      <td>Alim</td>
      <td>Mithu</td>
      <td>Khulna-2</td>
      <td>Opening</td>
      <td>Primary</td>
      <td>Closing</td>
      <td>Toukir</td>
      <td>Topu</td>
      <td>Khalishpur</td>
      <td>Opening</td>
      <td>Primary</td>
      <td>Closing</td>
      <td>Robiul</td>
      <td>Prohllad</td>
      <td>Satkhira</td>
      <td>Opening</td>
      <td>Primary</td>
      <td>Closing</td>
      <td>Bagerhat</td>
      <td>Opening</td>
      <td>Primary</td>
      <td>Closing</td>
      <td>Sohan</td>
      <td>Vacent</td>
      <td>Noapara</td>
      <td>Opening</td>
      <td>Primary</td>
      <td>Closing</td>
      <td>Chuknogor</td>
      <td>Opening</td>
      <td>Primary</td>
      <td>Closing</td>
      <td>Mizan</td>
      <td>Opening</td>
      <td>Primary</td>
      <td>Closing</td>
      <td>Rashed</td>
      <td>Opening</td>
      <td>Primary</td>
      <td>Closing</td>
      <td>Nazim</td>
      <td>Opening</td>
      <td>Primary</td>
      <td>Closing</td>
      <td>Parvez</td>
      <td>Opening</td>
      <td>Primary</td>
      <td>Closing</td>
      <td>Mollarhat</td>
      <td>Opening</td>
      <td>Primary</td>
      <td>Closing</td>
      <td>Mongla</td>
      <td>Opening</td>
      <td>Primary</td>
      <td>Closing</td>
      <td>Kshiani</td>
      <td>Opening</td>
      <td>Primary</td>
      <td>Closing</td>
    
    </tr>
    <tr align="center">
      <th scope="row">2</th>
      <td>VANILLA MUFFIN</td>
      <td>30</td>
      <td>12</td>
      <td>144</td>
      <td>Gift Box</td>
      <td>147.00</td>
      <td>12.25</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      
    </tr>
    <tr align="center">
      <th scope="row">3</th>
      <td>VANILLA MUFFIN</td>
      <td>50</td>
      <td>6</td>
      <td>72</td>
      <td>Gift Box</td>
      <td>147.00</td>
      <td>24.5</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>0</td>
      <td>43</td>
      <td></td>
      <td>43</td>
      <td></td>
      <td></td>
      <td></td>
      <td>0</td>
      <td>91</td>
      <td></td>
      <td>91</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>0</td>
      <td>123</td>
      <td></td>
      <td>123</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>0</td>
      <td>90</td>
      <td></td>
      <td>90</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>0</td>
      <td>149</td>
      <td></td>
      <td>149</td>
      <td></td>
      <td></td>
      <td></td>
      <td>0</td>
      <td>123</td>
      <td></td>
      <td>123</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>0</td>
      <td>89</td>
      <td></td>
      <td>89</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>0</td>
      <td>234</td>
      <td></td>
      <td>234</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>78</td>
      <td>78</td>
      
    </tr>
  </tbody>
</table>

@endsection
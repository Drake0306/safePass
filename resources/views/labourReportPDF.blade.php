<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="text-align: center">
        <h2>INDIAN OIL CORPORATION LTD</h2>
        <h5>Bhatinda Terminal</h5>
        <h5>Labour / Guard Ledger</h5>
    </div>
    <div>
        <table class="table" border="1" cellspacing="0" style="font-size: 10px; width: 100%">
            <thead>
                <tr>
                    <th rowspan="2">Issue Date</th>
                    <th rowspan="2">Card Number</th>
                    <th rowspan="2">Party Name</th>
                    <th rowspan="2">Type</th>
                    <th rowspan="2">Name</th>
                    <th rowspan="2">Fathers Name</th>
                    <th rowspan="2">Address</th>
                    <th rowspan="2">Aadhar No</th>
                    <th colspan="2">Police Verification</th>
                    <th rowspan="2">Police Station</th>
                    <th rowspan="2">Blood Group</th>
                    <th colspan="2">Card Validity</th>
                    <th rowspan="2">No of Renew</th>
                </tr>
                <tr>

                    <th>Number</th>
                    <th>Date</th>
                    <th>From</th>
                    <th>To</th>
                </tr>
            </thead>
            <tbody>
                @foreach($labour_data as $key => $item)
                <?php 
                    $party = DB::table('party_master')->where('sap_code',$item->party)->first();
                    $labour_type = DB::table('labour_type')->where('id',$item->type)->first();
                ?>

                <tr>
                    <td>
                        {{date('d-m-Y',strtotime(@$item->issue_date))}}
                    </td>
                    <td>{{@$item->card_number}}</td>
                    <td>{{@$party->party_name}}</td>
                    <td>{{@$labour_type->name}}</td>
                    <td>
                        {{@$item->full_name}}
                    </td>
                    <td class="">
                        {{@$item->fathers_name}}
                    </td>
                    <td class="">
                        {{@$item->house}}
                    </td>
                    <td>
                        {{@$item->adhar_no}}
                    </td>


                    <td class="">
                        {{@$item->ref}}
                    </td>
                    <td class="">
                        {{date('d-m-Y',strtotime(@$item->valid_from))}}
                    </td>

                    <td class="">
                        {{@$item->police_station}}
                    </td>
                    <td class="">
                        {{@$item->blood_group}}
                    </td>

                    <td class="">
                        {{date('d-m-Y',strtotime(@$item->card_valid_from))}}
                    </td>
                    <td class="">
                        {{date('d-m-Y',strtotime(@$item->card_valid_to))}}
                    </td>
                    <td class="">
                        {{@$item->renual_count}}
                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>
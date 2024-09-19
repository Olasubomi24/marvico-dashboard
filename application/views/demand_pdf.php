<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Demands Notice</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 20px;
        size: A4; /* Set the size to A4 */
      }

      .container {
        width: 21cm; /* Set the width to match A4 width */
        height: 29.7cm; /* Set the height to match A4 height */
        margin: 0 auto; /* Center the container */
      }

      h1 {
        text-align: center;
        margin-bottom: 0;
      }

      h2 {
        text-align: center;
        margin-bottom: 20px;
      }

      h1,
      h2 {
        text-align: center;
      }

      .property-details {
        margin-top: 20px;
        overflow: hidden; /* Clear float */
      }

      .payer {
        float: left;
      }

      .bank {
        float: right;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }

      table,
      th,
      td {
        border: 1px solid #ddd;
      }

      th,
      td {
        padding: 12px;
        text-align: left;
      }

      th {
        background-color: #f2f2f2;
      }

      /* Remove borders for the specific row before Total Due */
      table tr.no-border th,
      table tr.no-border td {
        border: none;
      }

      /* Add border to the Total Due row */
      table tr.total-due th,
      table tr.total-due td {
        border: none; /* Remove borders for all columns */
      }

      /* Add border to the last column of the Total Due row */
      table tr.total-due td:last-child {
        border: 1px solid #ddd; /* Add border to the last column */
      }

      .notice-box {
        border: 2px solid #ccc;
        padding: 5px 10px 5px 5px;
        margin-top: 20px;
        width: 50%;
      }

      /* Make h1 and notice header green */
      h1,
      .notice-box p:first-child {
        color: #32a846;
        font-weight: bolder;
      }

      /* Float Rep. Officer signature to the right */
      .rep-officer {
        float: right;
        margin-top: 20px; /* Add margin to create space between the line and signature */
        text-align: center; /* Center the text */
      }

      .rep-officer strong {
        display: block; /* Move the "Rep. Officer:" to a new line */
        margin-top: 10px; /* Add margin between the line and "Rep. Officer:" */
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1><?php echo $lga ?></h1>
      <h2>
        IN CONJUCTION WITH <?php echo $shop_name_upper ?> <br />
        DEMAND NOTICE FOR YEAR 20--
      </h2>
      
  
        
          <p><strong>Payer:<?php echo $payer_id ?></strong></p>
      
          <p><strong>Bank:</strong> Zenith - 1014938529</p>
          <p><strong>NO:</strong><?php echo $shop_no ?></p>
      
        
     

      <p>
      <i> In respect of the property situated at:</i></p>

      <p>
        The <?php echo $lga ?> under the LOCAL GOVERNMENT law demand
        payment of DEMAND NOTICE FOR YEAR 20...
      </p>
      <p>
        On the above Property of the approved rate in respect of the financial
        year under consideration.
      </p>
      <p>
        The amount due for the current year and arrears (if any) of the former
        rate is now due from you. Payment of the total amount is now due and is
        to be paid to <?php echo $shop_name ?> Ventures Account or pay cash to the Revenue
        Officers not later than 7 days from the date of this demand notice. If
        payment is not made within ONE WEEK of the day of this DEMAND NOTICE,
        Legal proceedings shall be taken immediately.
      </p>

      <table>
        <tr>
          <th>Year</th>
          <th>Bill Reference (VARIABLE)</th>
          <th>Summary</th>
          <th>Arrears (N)</th>
          <th>Debit (N)</th>
          <th>Credit(N)</th>
          <th>Balance (N)</th>
        </tr>
        <tr>
          <td><?php echo $year ?></td>
          <td>COLUNMN Bill Reference (VARIABLE)</td>
          <td><?php echo $shop_type ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td>Balance Value</td>
        </tr>
        <!-- Add more rows as needed -->
        <tr class="no-border total-due">
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>Total Due</td>
          <td><?php echo $shop_price ?></td>
        </tr>
      </table>

      <p><strong> Hours of Payment: Monday - Friday 8:00am - 4:00pm</strong></p>

      <!-- Float Rep. Officer signature to the right -->
      <p class="rep-officer">
        ___________________________ <br />
        <strong>Rep. Officer:</strong>
      </p>

      <div class="notice-box">
        <p><strong>NOTICE:</strong></p>
        <p>
          IT IS AN OFFENCE TO RENEGOTIATE THE FIGURE CONTAINED IN THIS DEMAND
          NOTICE EXCEPT FOR SUPERMARKET/STORES.
        </p>
        <p>
          This bill is issued by <?php echo $lga ?> under <?php echo $state ?>
          law no. 1 of 2002 on Local Government rates on properties/Business.
        </p>
        <p>
          Any person(s) who fails or neglects to pay rates, Fee or charges
          prescribed by the Local Government Law shall be deemed to commit an
          offence and shall be liable to prosecution in the law courts.
        </p>
      </div>
    </div>
  </body>
</html>
